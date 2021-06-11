<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControllerHome extends Controller {

    public function home(){
        return view("home");
    }

    public function covid($query){
        $json =Http::get('https://covid-api.mmediagroup.fr/v1/cases',[
            'country'=> $query
        ]);
        if(!$json->successful()) return null;
        return $json;

    }
}