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
        'moyen_paiement_',
        'toal_achat',
        'montant_paye',
        'reste',
        'nom_gestionnaire',
        'nom_entreprise',
    ];

}
