<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_agence',
        'email_agence',
        'contact_agence',
        'site_web',
        'localisation',
        'nom_gestionnaire',
        'nom_entreprise',
    ];


     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nom_gestionnaire', 'name');
    }

    public function entreprise(){
        return $this->belongsTo(Entreprise::class,'nom_entreprise','nom_entreprise');
    }



}
