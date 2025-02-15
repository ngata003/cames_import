<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrait extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_client',
        'date_retrait',
        'nom_agence',
        'nom_gestionnaire',
        'nom_entreprise',
    ];

    public function user()
    {
        return $this->belongsTo('nom_gestionnaire','name');
    }

    public function entreprise(){
        return $this->belongsTo('nom_entreprise','nom_entreprise');
    }
}
