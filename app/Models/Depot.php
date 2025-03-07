<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Depot extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_client',
        'nom_agence',
        'date_depart',
        'couleur_colis',
        'duree_trajet',
        'status',
        'image_colis',
        'moyen_transport',
        'nom_gestionnaire',
        'nom_entreprise',
    ];

    public function Entreprise(){
        return $this->belongsTo(Entreprise::class,'nom_entreprise','nom_entreprise');
    }

    public function Gestionnaires(){
        return $this->belongsTo(User::class,'nom_gestionnaire','name');
    }

    public function factures(){
        return $this->belongsTo(Facture::class,'nom_client','nom_client');
    }
}
