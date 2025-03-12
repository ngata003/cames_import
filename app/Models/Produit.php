<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'prix_unitaire',
        'nom_gestionnaire',
        'nom_entreprise',
        'image_produit',
    ];

    public function Entreprise(){
        return $this->belongsTo(Entreprise::class,'nom_entreprise','nom_entreprise');
    }

    public function Gestionnaire(){
        return $this->belongsTo(User::class,'nom_gestionnaire','name');
    }

}
