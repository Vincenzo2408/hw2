<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get("home","ControllerHome@home")->name("home");
Route::get("home/covid/{query}","ControllerHome@covid");

Route::get("login","LoginController@login")->name("login");
Route::get("logout", "LoginController@logout")->name("logout");
Route::post("login", "LoginController@checkLogin");

Route::get("register","Controlloregistrazione@registrazione")->name("register");
Route::post("register", "Controlloregistrazione@creazione");
Route::get("register/email/{query}", "Controlloregistrazione@checkEmail");
Route::get("register/username/{query}", "Controlloregistrazione@checkUsername");

Route::get("area_personale","ControllerArea@areapersonale")->name("area_personale");
Route::get("area_personale/cabine","ControllerArea@caricacabine");
Route::get("area_personale/caricamento_preferito/{query}","ControllerArea@caricamentopreferito");
Route::get("area_personale/prelevamento_valutazione/","ControllerArea@prelevamentovalutazione");
Route::get("area_personale/conta_valutazione","ControllerArea@conteggio");
Route::get("area_personale/rimuovi_valutazione","ControllerArea@rimozione");
Route::get("area_personale/procedura/{query}","ControllerArea@procedura");

Route::get("tratta","Controllertratta@tratta")->name("tratta");
Route::get("tratta/caricamento_tratte/","Controllertratta@carica");

Route::get("traviata","Controllertraviata@traviata")->name("traviata");
Route::get("traviata/spotify/{query}","Controllertraviata@spotify");
Route::get("traviata/libro/{query}","Controllertraviata@libro");
Route::get("traviata/caricapreferiti/","Controllertraviata@preferito");
Route::get("traviata/libro_add/{query}","Controllertraviata@addlibro");
Route::get("traviata/musica_add/{query}","Controllertraviata@addmusica");

