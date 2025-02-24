<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    //
    public function add_agencies(Request $request){

        $messages = [
            'nom_agence.required'=>'veuillez remplir la case du nom de l\'agence',
            'nom_agence.unique'=>'veuillez changer le nom de l\'agence car celui-ci existe déjà',
            'nom_agence.regex' => 'veuillez remplir un nom valide contenant des lettres majuscules ou miniscules',

            'contact_agence.required' => 'veuillez remplir la case de contact',
            'contact_agence.unique' => 'veuillez changer de contact car celui-ci existe deja ici',
            'contact_agence.regex' => 'veuillez rentrer un numero valide ',

            'localisation.regex' => 'veuillez une localisation sans chiffres',
            'site_web.regex' => 'veuillez rentrer un lien de site du style www.exemple.com ou https://exemple.com',
            'email_agence.regex' => 'veuillez rentrer une adresse valide',

        ];

        $request->validate([
            'nom_agence' => 'required|string|max:255|unique:agences,nom_agence|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'contact_agence' => 'required|unique:agences,contact_agence|regex:/^\+?[1-9]\d{6,14}$/',
            'localisation' => 'nullable|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_agence' => 'nullable|email|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'site_web' => 'nullable|regex:/^(https?:\/\/)?([\w\-]+\.)+[\w]{2,}(\/\S*)?$/',
            'nom_gestionnaire' => 'required',
            'nom_entreprise' => 'required',

        ], $messages);

        $agence = new Agence();

        $agence->nom_agence = $request->input('nom_agence');
        $agence->contact_agence = $request->input('contact_agence');
        $agence->localisation = $request->input('localisaton');
        $agence->email_agence = $request->input('email_agence');
        $agence->nom_gestionnaire = $request->input('nom_gestionnaire');
        $agence->nom_entreprise = $request->input('nom_entreprise');
        $agence->site_web = $request->input('site_web');

        $agence->save();

        return back()->with('agence_success','agence enregistré avec succès');
    }
}
