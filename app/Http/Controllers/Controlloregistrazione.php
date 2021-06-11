<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Controlloregistrazione extends Controller {
   public function registrazione(){
        $error = false;
        return view('registrazione')->with('csrf_token', csrf_token())
                                    ->with('error', $error);
   }

    public function creazione(){
        $request = request();


        if($this->countErrors($request)===false){ /*Chiamare funzione degli errori*/
            $newutente=User::create([
                'Username' => $request['username'],
                'Pass' => password_hash($request['password'], PASSWORD_BCRYPT), 
                'Nome' => $request['nome'],
                'Cognome' => $request['cognome'],
                'Email' => $request['email'],
            ]);
                return redirect('/');
        }
        else{
            $error=true;
            return view('registrazione')->with('csrf_token', csrf_token())
                                        ->with('error', $error);}
    }

    private function countErrors($data) {
        
        $error=false;
        #Controllo username (server)
        $username = User::where('Username', $data['username'])->first();
        if ($username !== null) {
            $error = true;
        }
        #Controllo email (server)
        $email = User::where('Email', $data['email'])->first();
        if($email !== null){
            $error=true;
        }
        #Conferma password (server)
        $pass=$data['password'];
        $conferma=$data['conferma'];
        if(strcmp($pass, $conferma)!=0){
            $error=true;
        }
        #Conferma lunghezza password (server)
        if((strlen($data['password'])<6) || (strlen($data['password'])>15)){
            $error=true;
        }
        return $error;
    }   

    public function checkUsername($query) {
        $exist = User::where('Username', $query)->exists();
            if($exist != null){
                return 1; 
            }
            else{
                return 0;
            }
    }

    public function checkEmail($query) {
        $exist = User::where('Email', $query)->exists();
            if($exist != null){
                return 1; 
            }
            else{
                return 0;
            }
    }

}