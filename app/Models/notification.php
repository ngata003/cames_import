<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_gestionnaire',
        'description',
        'nom_entreprise',
        'status',
    ];

    public function Gestionnaire(){
        return $this->belongsTo(User::class,'nom_gestionnaire','name');
    }

    public function Entreprise(){
        return $this->belongsTo(Entreprise::class,'nom_entreprise','nom_entreprise');
    }
}
