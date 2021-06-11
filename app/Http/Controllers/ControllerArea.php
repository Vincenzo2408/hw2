<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Carrozza;
use App\Models\Treno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ControllerArea extends Controller {

    public function areapersonale() {
        if(session('user_id') != null) {
            $sessione=session('user_id');
            $treni=Treno::all();
            return view("areapersonale")->with('user_id',$sessione)
                                        ->with("treni", $treni)
                                        ->with('csrf_token', csrf_token()); /*per visualizzare il nome nel Benvenuto*/
        }
        else { 
            return redirect('/');                        
        }
     }

     public function caricacabine(){
        return Carrozza::all()->where("Codice_carrozza",">",0);
     }

     public function caricamentopreferito($query){ /*query contiene il numero della carrozza*/
            $nome=session('user_id');
            $totali=Carrozza::all()->count();
            if(($query<1)||($query>$totali-1)){
              $query=-1;
            }
            $user=User::where('Username',$nome)->update([
                'Votazione'=>$query
            ]);
     }

     public function prelevamentovalutazione(){
         $votazione=array();
         $nome=session('user_id');
         $votazione = User::where("Username", $nome)->get("Votazione")->first(); /*Il select crea un array ($votazione) con dentro "Votazione"*/
         $votazione=$votazione->Votazione; /*Estrapolazione da $votazione, Votazione*/
        
         return Carrozza::all()->where('Codice_carrozza',$votazione);  
     }

     public function conteggio(){
        /*$query = "SELECT count(*) AS conteggio, carrozza.Nome AS Nome FROM utenti, carrozza 
        WHERE utenti.Votazione=carrozza.Codice_carrozza AND carrozza.Codice_carrozza>0 GROUP BY carrozza.Nome";*/
        return Carrozza::select("Carrozza.Nome",Carrozza::raw("COUNT(*) as conteggio"))->join("utenti","Codice_carrozza","=","Votazione")
                                                        ->where("Codice_carrozza",">",0)
                                                        ->groupBy("Carrozza.Nome")
                                                        ->get(); /*->join("utenti","Codice_carrozza","=","Votazione")*/
     }

     public function rimozione(){
         $nome=session('user_id');
        User::where('Username',$nome)->update([
            'Votazione'=>NULL
        ]);
     }

     public function procedura($query){
         /*$query="SELECT c.Nome FROM carrozza c join treno t on c.Codice_carrozza=t.Cabina_montata where t.ID=\"$treno\"";*/
        $treno=Treno::where("ID",$query)->first(); 
        return Carrozza::where("Codice_carrozza",$treno->Cabina_montata)->get(); 
        
        /*Carrozza::select("Carrozza.Nome")->join("Treno","Codice_carrozza","=","Cabina_montata")->where("Treno.ID=$query)->get()*/
     }



}