<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratta extends Model {
    public $timestamps = false;

    
    
    protected $table='tratta';

    protected $primaryKey = 'CodiceT';

    protected $fillable = [
        'CodiceT',
        'Orario',
        'Immagine',
        'CittàArrivo',
    ];



    public function versotreno(){
        return $this->belongsToMany('App\Models\Treno','offerta','CodiceT','IdTreno');
    }

    
}

?>