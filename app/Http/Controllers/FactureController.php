<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture;
use Auth;
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

        return back()->with('status_deleted','commandes supprimées avec succès');
    }

    public function updateCommandes($id){
        $entreprise = Session::get('entreprise_active');

        $factures = Facture::find($id);
        $commandes = Commande::where('nom_entreprise',$entreprise->nom_entreprise)->where('id_facture',$id)->get();
        $nbre_lignes = Commande::where('nom_entreprise',$entreprise->nom_entreprise)->where('id_facture',$id)->count();

        return view('commandes.commandes_edit', compact('factures','commandes','nbre_lignes'));
    }


    public function research_factures(){
        $entreprise =  Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $research = $_GET['nom_client'];

        $commandes = Facture::where('nom_client', 'LIKE','%'.$research.'%')->orWhere('updated_at','LIKE','%'.$research.'%')->get();
        return view('commandes.result_research',compact('commandes'));
    }

    public function modifier_facCommandes(Request $request, $id){

        $entreprise = Session::get('entreprise_active');
        $factures = Facture::find($id);
        $user = Auth::user();

        $factures->update([
            'nom_client' => $request->input('nom_client'),
            'email_client' => $request->input('email_client'),
            'numero_client' =>$request->input('numero_client'),
            'moyen_paiement' => $request->input('moyen_paiement'),
            'montant_paye' => $request->input('montant_paye'),
            'total_achat'=> $request->input('total_achat'),
            'reste' => $request->input('reste'),
            'status'=> "nom-depose",
            'nom_gestionnaire' => $user->name,
            'nom_entreprise' => $entreprise->nom_entreprise,
        ]);

       Commande::where('nom_entreprise', $entreprise->nom_entreprise)->where('id_facture',$id)->delete();

       $numRows = (int) $request->input('numRows');

       for ($i=0; $i <= $numRows ; $i++) {
            if ($request->has("nom_produit$i") && $request->has("prix_unitaire$i") && $request->has("qte_commandee$i") && $request->has("total$i")) {
                Commande::create([
                    'id_facture' => $factures->id,
                    'nom_produit' => $request->input("nom_produit$i"),
                    'prix_unitaire' => $request->input("prix_unitaire$i"),
                    'qte_commandee' => $request->input("qte_commandee$i"),
                    'total' => $request->input("total$i"),
                    'nom_entreprise' => $entreprise->nom_entreprise,
                    'nom_gestionnaire' => $user->name,
                ]);
            }

       }

    return redirect('command_enregistrees')->with('success_edit','modifications de commandes reussies');
    }

}
