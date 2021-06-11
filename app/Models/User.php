<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*Una classe ORM si aspetta che la tabella contenga i campi
    created_at e updated_at (

     Se questi campi non sono presenti nella tabella:*/
    public $timestamps = false;

    /*Non essendoci Users come tabella, per prendere il nome corretto usare: */
    protected $table = 'utenti';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     /* Variabili di utenti */
    protected $fillable = [
        'Username',
        'Nome',
        'Cognome',
        'Email',
        'Pass',
        'Votazione',
        'Musica',
        'Libro',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function versocarrozza(){
        return $this->hasOne('App\Models\Carrozza','Codice_carrozza','Votazione');
    }
}

?>
