<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_client',
        'email_client',
        'numero_client',
        'moyen_paiement',
        'total_achat',
        'montant_paye',
        'reste',
        'status',
        'nom_gestionnaire',
        'nom_entreprise',
    ];

    public function gestionnaire()
    {
        return $this->belongsTo(User::class,'nom_gestionnaire','name');
    }

    public function entreprise(){
        return $this->belongsTo('nom_entreprise','nom_entreprise');
    }

    public function depot(){
        return $this->hasOne(Depot::class,'nom_client','nom_client');
    }

}
