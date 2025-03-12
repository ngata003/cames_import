<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture;
use Illuminate\Http\Request;
use Session;

class FactureController extends Controller
{
    //

    public function deleteCommandes($id){
        $facture = Facture::find($id);
        $facture->delete();

        $commandes = Commande::where('id_facture',$id);
        $commandes->delete();

        return back()->with('status','commandes supprimées avec succès');
    }

    public function research_factures(){
        $entreprise =  Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $research = $_GET['nom_client'];

        $commandes = Facture::where('nom_client', 'LIKE','%'.$research.'%')->orWhere('updated_at','LIKE','%'.$research.'%')->get();
        return view('commandes.result_research',compact('commandes'));
    }
}
