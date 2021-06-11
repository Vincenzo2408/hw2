<?php

use Illuminate\Routing\Controller;
use App\Models\Tratta;
use App\Models\Treno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Controllertratta extends Controller {
    
    public function tratta() {
        if(session('user_id') != null) { 
            return view('areatratta');
        }
        else { 
            return redirect('/');   
        }
    }

    public function carica(){
     
        /*$query = "SELECT * FROM (tratta tr join offerta of on tr.CodiceT=of.CodiceT) join treno t on of.IdTreno=t.ID order by tr.orario;";*/
        /*return Tratta::join("offerta","offerta.CodiceT","=","tratta.CodiceT")
                        ->join("treno","offerta.IdTreno","=","treno.ID")
                        ->orderBy("orario")
                        ->get();*/
       
        
        $array=array();
        
        
        foreach(Tratta::orderBy("Orario")->get() as $treno) {
            $array[]=([
                "Orario"=>$treno->Orario,
                "Immagine"=>$treno->Immagine,
                "CittàArrivo"=>$treno->CittàArrivo,
                "Agenz"=>$treno->versotreno()->get(),
            ]);
          
        }
       
        return $array;
    }
}