<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treno extends Model {
    public $timestamps = false;
    
    protected $table='treno';

    protected $fillable = [
        'ID',
        'Agenzia',
        'Modello',
        'Cabina_montata',
    ];

    public function versocarrozza_(){
        return $this->hasMany('App\Models\Carrozza','Codice_cabina','Cabina_montata');
    }

    public function versotratta(){
        return $this->belongsToMany('App\Models\Tratta','offerta','IdTreno','CodiceT');
    }
}

?>