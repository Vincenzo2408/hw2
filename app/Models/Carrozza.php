<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrozza extends Model {
    public $timestamps = false;

    protected $table='carrozza';

    protected $fillable = [
        'Codice_carrozza',
        'Nome',
        'Immagine',
        'Descrizione',
    ];

    public function versoutente(){
        return $this->hasMany('App\Models\User','Votazione','Codice_carrozza');
    }

    public function versotreno_f(){
        return $this->hasOne('App\Models\Treno','Cabina_montata','Codice_carrozza');
    }
}

