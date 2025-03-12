<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Session;

class pdfController extends Controller
{
    //

    public function generateGestionnairesPdf(){
        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $gestionnaires = User::where('nom_entreprise',$nom_entreprise)->get();

        $pdf = pdf ::loadView('gestionnaires.gestionnaires_rapport', compact('gestionnaires','nom_entreprise')) ;

        return $pdf->download('gestionnaires_' . $nom_entreprise . '.pdf');

    }

    public function generateFacturesPdf(){
        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;
        $logo_entreprise = $entreprise->logo_entreprise;

        $factures = Facture::where('nom_entreprise',$nom_entreprise)->get();
        $pdf = Pdf::loadView('commandes.factures_pdf',compact('factures', 'nom_entreprise', 'logo_entreprise' ));
        return $pdf->download('factures_'.$nom_entreprise.'.pdf');
    }

    public function imprimer_facture($id){
        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;
        $logo_entreprise = $entreprise->logo_entreprise;


        $facture = Facture::find($id);

        $commandes = Commande::where('id_facture',$facture->id)->get();

        $pdf = pdf::loadView('commandes.commandes_pdf', compact('commandes','entreprise', 'facture'));

        return $pdf->stream('factures_'.$nom_entreprise.'.pdf');
    }

    public function imprimer_rap_pdf(){
        $nom_entreprise = Session::get('entreprise_active')->nom_entreprise;
        $logo_entreprise = Session::get('entreprise_active')->logo_entreprise;

        $produits = Produit::where('nom_entreprise',$nom_entreprise)->get();
        $pdf = Pdf::loadView('produits.rap_pdf',compact('logo_entreprise','nom_entreprise','produits'));
        return $pdf->stream('produits_'.$nom_entreprise.'.pdf');
    }
}
