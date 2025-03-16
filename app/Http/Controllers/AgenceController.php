<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Commande;
use App\Models\Depot;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Session;

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

    public function delete_agences($id){
        $agences = Agence::find($id);

        $agences->delete();

        return back()->with('delete_status','agence supprimée avec succès');
    }

    public function deposer_colis(){

        $entreprise = Session::get('entreprise_active');

        $nom_entreprise = $entreprise->nom_entreprise;

        $clients =  Commande::where('nom_entreprise',$nom_entreprise)->get();
        $agences = Agence::where('nom_entreprise',$nom_entreprise)->get();

        return view('agences.depot_colis', compact('clients','agences'));
    }

    public function save_depot(Request $request){
        $messages = [
            'nom_client.required' => 'veuillez insrerer le nom du client',
            'nom_agence.required' => 'veuillez renseigner le nom de l\'agence' ,

        ];

        $request->validate([
            'nom_client' =>'required',
            'nom_agence' => 'required',
            'date_depart' => 'required',
            'couleur_colis' => 'required|string|max:255|regex:',
            'moyen_transport' => 'required',
            'status' => 'required',
            'duree_trajet' => 'required',
            'image_colis' => '',
        ], $messages);

        if ($request->hasFile('image_colis')) {
            $produitFile = $request->file('image_colis');
            $imageColis = time().'.'. $produitFile->getClientOriginalExtension();
            $produitFile->move(public_path('assets/images'),$imageColis);
        }

        $depot = new Depot();

        $depot->nom_client = $request->input('nom_client');
        $depot->nom_agence = $request->input('nom_agence');
        $depot->date_depart = $request->input('date_depart');
        $depot->couleur_colis = $request->input('couleur_colis');
        $depot->moyen_transport = $request->input('moyen_transport');
        $depot->status = $request->input('status');
        $depot->duree_trajet = $request->input('duree_trajet');
        $depot->image_colis = $imageColis;

        $depot->save();

        return back()->with('status','agence enregistrée avec succès');

    }

    public function update_depot(Request $request , $id){

        $details = Depot::find($id);

        $details->nom_client = $request->input('nom_client');
        $details->nom_agence = $request->input('nom_agence');
        $details->date_depart = $request->input('date_depart');
        $details->couleur_colis = $request->input('couleur_colis');
        $details->status  = $request->input('status');
        $details->moyen_transport = $request->input('moyen_transport');
        $details->duree_trajet = $request->input('duree_trajet');
        if ($request->hasFile('image_produit')) {
            if ($details->image_colis) {
                $oldImagePath = public_path('assets/images/' . $details->image_colis);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image_colis = $request->file('image_colis');
            $prodPicture = time() . '.' . $image_colis->getClientOriginalExtension();
            $image_colis->move(public_path('/assets/images'), $prodPicture);

            $details->image_produit = $prodPicture;
        }
        $details->save();

        return back()->with('updated_success','');
    }

    public function delete_depot($id){
        $depot = Depot::find($id);

        if ($depot) {
            $depot->delete();
            return back()->with('status_delete','depot supprimé avec succès');
        }
    }

   




}
