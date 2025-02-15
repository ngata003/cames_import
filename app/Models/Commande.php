<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'qte_commandee',
        'total',
        'nom_gestionnaire',
        'nom_entreprise',
        'id_facture',
    ];

    public function user(){
        return $this->belongsTo('nom_gestionnaire','name');
    }

    public function entreprise (){
        return $this->belongsTo( Entreprise::class,'nom_entreprise','nom_entreprise');
    }

    public function facture(){
        return $this->belongsTo(Facture::class,'id_facture');
    }
}

