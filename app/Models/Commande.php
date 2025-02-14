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
}
