<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class Controllertraviata extends Controller {
    
    public function traviata() {
        if(session('user_id') != null) { 
            return view('areatraviata');
        }
        else { 
            return redirect('/');   
        }
    }

    public function libro($query) {

        /*Il link sul get deve seguire il link del precedente homework*/
        $json =Http::get('http://openlibrary.org/search.json',[
            'title'=> $query
        ]);
        if(!$json->successful()) return null;
        return $json;
    }

    public function spotify($query) {

        $token = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_CLIENT_SECRET')),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($token->failed()) return null;

        $json = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token']
        ])->get('https://api.spotify.com/v1/search', [
            'type' => "album",
            'q'=> $query
        ]);

        if(!$json->successful()) return null;
        return $json;
    }

    public function preferito(){
        $nome=session('user_id');
        return User::all()->where("Username", $nome);
    }

    public function addmusica($query){
        $nome=session('user_id');
           
        $user=User::where('Username',$nome)->update([
                'Musica'=>$query
            ]);
    }
    
    public function addlibro($query){
        $nome=session('user_id');
           
        $user=User::where('Username',$nome)->update([
                'Libro'=>$query
            ]);
    }
}


