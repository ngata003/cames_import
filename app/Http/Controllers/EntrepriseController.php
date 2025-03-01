<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Auth;
use Illuminate\Http\Request;
use Session;

class EntrepriseController extends Controller
{
    //

    public function add_entreprise(Request $request){

        $messages = [
            'nom_entreprise.required' => 'veuillez rentrer un nom de votre entreprise',
            'nom_entreprise.unique' => 'veuillez un autre nom car celui-ci existe déjà',
            'nom_entreprise.regex' => 'veuillez rentrer un nom valide sans chiffres',

            'email_entreprise.required' => 'veuillez remplir la case du mail',
            'email_entreprise.unique' => 'veuillez changer de mail car celui-ci existe',
            'email_entreprise.regex' => 'veuillez saisir un email valide ',

            'fax_entreprise.required' => 'veuillez remplir le champ de contact ',
            'fax_entreprise.unique' => 'veuillez changer de mail car celui-ci existe',
            'fax_entreprise.regex' => 'veuillez saisir un numero de telephone valide',

            'localisation.required' => 'veuillez saisir le champ de localisation',
            'localisation.regex' => 'veuillez rentrer une localisation valable constitué uniquement des lettres (ville) ',

            'site_web.regex' => 'veuillez rentrer un lien de site valide et correct',
        ];

        $request->validate([
            'nom_entreprise' => 'required|string|max:255|unique:entreprises,nom_entreprise|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_entreprise' => 'required|email|unique:entreprises,email_entreprise|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'fax_entreprise' => 'required|unique:entreprises,fax_entreprise|regex:/^\+?[1-9]\d{6,14}$/',
            'localisation' => 'nullable|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'site_web' => 'nullable|regex:/^(https?:\/\/)?(www\.)?[\w\-]+\.[a-zA-Z]{2,6}(\/\S*)?$/',
            'logo_entreprise' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',

        ], $messages);

        $user = Auth::user();

        if ($request->hasFile('logo_entreprise')) {
            $imageFile = $request->file('logo_entreprise');
            $logoName = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images'),$logoName);
        }


        $entreprise = new Entreprise();

        $entreprise->nom_entreprise = $request->input('nom_entreprise');
        $entreprise->email_entreprise = $request->input('email_entreprise');
        $entreprise->fax_entreprise = $request->input('fax_entreprise');
        $entreprise->localisation = $request->input('localisation');
        $entreprise->site_web = $request->input('site_web');
        $entreprise->nom_gestionnaire = $request->input('nom_gestionnaire');
        $entreprise->logo_entreprise = $logoName;
        $entreprise->nom_gestionnaire = $user->name;
        $entreprise->is_connected = true;

        $entreprise->save();

        $user = Auth::user();
        $user->entreprise_created = true ;
        $user->save();

        Session::put('entreprise_active', $entreprise);

        return redirect('/accueil');
    }

    public function affichage_vue(){
        $entreprise = Session::get('entreprise_active');

        $nom_entreprise = $entreprise->nom_entreprise;

        $infos = Entreprise::where('nom_entreprise',$nom_entreprise)->get();

        return view('entreprise_management', compact('infos'));
    }

    public function update_entreprise(Request $request,$id){
        $entreprise = Entreprise::find($id);

        $entreprise->nom_entreprise = $request->input('nom_entreprise');
        $entreprise->email_entreprise = $request->input('email_entreprise');
        $entreprise->fax_entreprise = $request->input('fax_entreprise');
        $entreprise->site_web = $request->input('site_web');
        $entreprise->localisation = $request->input('localisation');

        $entreprise->save();

        return back()->with('updated_status','entreprise modifié avec succès');
    }

}
