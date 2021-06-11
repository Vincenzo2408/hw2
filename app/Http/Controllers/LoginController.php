<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function login() {
        if(session('user_id') != null) { 
            return redirect("area_personale");
        }
        else { 
            $errore=false;
            return view('login')->with('csrf_token', csrf_token())
                                ->with('errore', $errore);
        }
     }

     public function checkLogin() {
         $user = User::where('Username', request('username'))->where('Pass',password_verify('Pass', request('password')))->first();
           
         if($user !== null) {
             Session::put('user_id', $user->Username);
             return redirect("area_personale");
         }
         else {
            $errore=true;
            return view('login')->with('csrf_token', csrf_token())
                                ->with('errore', $errore);
         }
     }

     public function logout() {
         Session::flush();
         return redirect('/');
     }
}
?>