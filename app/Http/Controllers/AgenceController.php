<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Commande;
use App\Models\Depot;
use App\Models\Facture;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class AgenceController extends Controller
{
    //fonction pour enregistrer les agences au sein de l'entreprise
    public function add_agencies(Request $request){

        $messages = [
            'nom_agence.required'=>'veuillez remplir la case du nom de l\'agence',
            'nom_agence.unique'=>'veuillez changer le nom de l\'agence car celui-ci existe déjà',
            'nom_agence.regex' => 'veuillez remplir un nom valide contenant des lettres majuscules ou miniscules',

            'contact_agence.required' => 'veuillez remplir la case de contact',
            'contact_agence.unique' => 'veuillez changer de contact car celui-ci existe deja ici',
            'contact_agence.regex' => 'veuillez rentrer un numero valide ',

            'localisation.regex' => 'veuillez une localisation sans chiffres',

            'email_agence.regex' => 'veuillez rentrer une adresse valide',
            'email_agence.unique' => 'veuillez changer votre adresse car celle-ci est deja enregistrée',

            'site_web.regex' => 'veuillez rentrer un lien de site du style www.exemple.com ou https://exemple.com',
            'site_web.unique' => 'veuillez rentrer un autre lien de site celui existe deja',

        ];

        $request->validate([
            'nom_agence' => 'required|string|max:255|unique:agences,nom_agence|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'contact_agence' => 'required|unique:agences,contact_agence|regex:/^\+?[1-9]\d{6,14}$/',
            'localisation' => 'nullable|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_agence' => 'nullable|email|unique:agences,email_agence|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'site_web' => 'nullable|unique:agences,site_web|regex:/^(https?:\/\/)?(www\.)?[\w\-]+(\.[\w\-]+)+([\/?].*)?$/i'

        ], $messages);

        $user = Auth::user();

        $entreprise = Session::get('entreprise_active');

        $entreprise_nom = $entreprise->nom_entreprise;

        $nom_gestionnaire = $user-> name;

        $agence = new Agence();

        $agence->nom_agence = $request->input('nom_agence');
        $agence->contact_agence = $request->input('contact_agence');
        $agence->localisation = $request->input('localisation');
        $agence->email_agence = $request->input('email_agence');
        $agence->nom_gestionnaire = $nom_gestionnaire;
        $agence->nom_entreprise = $entreprise_nom;
        $agence->site_web = $request->input('site_web');

        $agence->save();

        return back()->with('agence_success','agence enregistré avec succès');
    }

    //fonction pour afficher les informations dans le tableau de la vue agences.
    public function affichage_vue(){
        $entreprise = Session::get('entreprise_active');

        $nom_entreprise = $entreprise->nom_entreprise;

        $user = Auth::user();

        if ($user->role === 'etranger') {
            $agences = Agence::where('nom_gestionnaire',$user->name)->where('nom_entreprise',$nom_entreprise)->get();
            return view('agences.agence', compact('agences'));
        }
        elseif ($user->role === 'admin') {
            $agences = Agence::where('nom_entreprise',$nom_entreprise)->get();

            return view('agences.agence', compact('agences'));
        }
    }


    //fonction pour modifier les informations des agences dans l'entreprise
    public function update_agence(Request $request, $id){
        $agency = Agence::find($id);

        $agency->nom_agence = $request->input('nom_agence');
        $agency->contact_agence = $request->input('contact_agence');
        $agency->site_web = $request->input('site_web');
        $agency->localisation = $request->input('localisation');
        $agency->email_agence = $request->input('email_agence');

        $agency->save();

        return back()->with('update_success','informations d\'agence modifiées avec succès');

    }

    //fonction pour supprimer les agences dans l'entreprise.

    public function delete_agences($id){
        $agences = Agence::find($id);

        $agences->delete();

        return back()->with('delete_status','agence supprimée avec succès');
    }


}
