<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_entreprise',
        'email_entreprise',
        'logo_entreprise',
        'site_web',
        'fax_entreprise',
        'localisation',
        'nom_gestionnaire',
        'is_connected',
    ];
}
