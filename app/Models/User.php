<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'contact',
        'password',
        'type',
        'role',
        'residence',
        'profil',
        'is_connected',
        'nom_createur',
        'nom_entreprise'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agence(){
        return $this->hasMany(Agence::class,'nom_gestionnaire','name');
    }

    public function commande(){
        return $this->hasMany(Commande::class,'nom_gestionnaire','name');
    }

    public function Entreprise()
    {
        return $this->hasOne(Entreprise::class,'nom_gestionnaire','name');
    }

    public function facture(){
        return $this->hasMany(Facture::class,'nom_gestionnaire','name');
    }

    public function retrait(){
        return $this->hasMany(Retrait::class,'nom_gestionnaire','name');
    }

    public function employes(){
        return $this->hasMany(User::class,'nom_createur','name');
    }

    public function createur(){
        return $this->belongsTo(User::class,'nom_createur', 'name');
    }

    public function entreprise_employes(){
        return $this->belongsTo(Entreprise::class,'nom_entreprise','nom_entreprise');
    }

    public function Depot(){
        return $this->hasMany(Depot::class,'nom_gestionaire','name');
    }
}
