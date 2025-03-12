<?php

namespace App\Http\Controllers;

use App\Mail\AlertAdmin;
use App\Mail\AlertClientMail;
use App\Mail\FactureClientAlert;
use App\Mail\NotifiedAdmin;
use App\Models\Commande;
use App\Models\Depot;
use App\Models\Entreprise;
use App\Models\Facture;
use App\Models\User;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Session;

class CommandeController extends Controller
{
    //

    public function add_commandes(Request $request){
        //dd($request->all());

        $user = Auth::user();
        $nom_utilisateur = $user->name;

        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $messages = [
            'nom_client.required' => 'veuillez saisir un nom de client',
            'nom_client.regex' => 'Veuillez entrer un nom uniquement constitué uniquement des lettres ',

            'email_client.required' => 'veuillez saisir une adresse email',
            'email_client.regex' => 'veuillez entrer une adresse email valide : exemple: azgddcv@gmail.com',

            'numero_client.required' => 'veuillez entrer un contact et ne laisses pas le champ contact vide',
            'numero_client.regex' => 'veuillez entrer contact valide  ',

            'moyen_paiement.required' => 'veuillez entrer un moyen de paiement',
            'total_achat.required' => 'veuillez remplir la case de total achat',
            'reste.required' => 'veuillez remplir la case de reste',
            'montant_paye' => 'veuillez remplir la case de montant payé',
        ];


        $request->validate([
            'nom_client' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_client' => 'required|string|max:255|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'numero_client' => 'required|regex:/^\+?[1-9]\d{6,14}$/',
            'moyen_paiement' => 'required',
            'montant_paye' => 'required',
            'total_achat' => 'required',
            'reste' => 'required',
        ], $messages);


        $inf_facture = new Facture();
        $numRows = $request->input('numRows');

        $inf_facture -> nom_client = $request->input('nom_client');
        $inf_facture -> email_client = $request->input('email_client');
        $inf_facture -> numero_client = $request->input('numero_client');
        $inf_facture -> moyen_paiement = $request->input('moyen_paiement');
        $inf_facture-> total_achat = $request->input('total_achat');
        $inf_facture -> montant_paye = $request->input('montant_paye');
        $inf_facture-> reste = $request->input('reste');
        $inf_facture->nom_gestionnaire = $nom_utilisateur;
        $inf_facture->nom_entreprise = $nom_entreprise;

        $inf_facture->save();

        $id_facture = $inf_facture->id;

        for ($i=0; $i <= $numRows ; $i++) {
            $messages =  [
                'nom_produit'.$i.'required' => 'le nom du produit'.$i.'est attendu',
                'nom_produit'.$i.'regex' => 'veuillez entrer un nom de produit valide pour le produit'.$i,
                'prix_unitaire'.$i.'required' => 'veuillez entrer un prix pour le produit'.$i,
                'quantite_commandee'.$i.'required' => 'veuillez entrer une quantite pour le produit'.$i,
                'total'.$i.'required' => 'veuillez entrer un total pour le produit'.$i,
            ];

            $request->validate([
                'nom_produit'.$i =>'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
                'prix_unitaire'.$i => 'required',
                'qte_commandee'.$i => 'required',
                'total'.$i => 'required',
            ], $messages);

            $commandes = new Commande();

            $commandes->nom_produit = $request->input('nom_produit'.$i);
            $commandes->prix_unitaire = $request->input('prix_unitaire'.$i);
            $commandes->qte_commandee = $request->input('qte_commandee'.$i);
            $commandes->total = $request->input('total'.$i);
            $commandes->id_facture = $id_facture;
            $commandes->nom_gestionnaire = $nom_utilisateur;
            $commandes->nom_entreprise = $nom_entreprise;

            $commandes->save();
        }

        return redirect('/command_enregistrees')->with('command_save','commandes enregistrees');
    }

    public function affichage_view(){
        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $user = Auth::user();

        if ($user->type == 'admin') {
            $commandes = Facture::where('nom_entreprise',$nom_entreprise)->get();

            return view ('commandes.rap_commandes', compact('commandes'));
        }

        else{
            $commandes = Facture::where('nom_entreprise',$nom_entreprise)->where('nom_gestionnaire',$user->name)->get();
            return view('commandes.rap_commandes', compact('commandes'));

        }
    }



}
