<?php

namespace App\Http\Controllers;

use App\Mail\AlertAdmin;
use App\Mail\AlertClientMail;
use App\Mail\AlertImportateur;
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

    // function used to show all sells

    public function affichage_view(){
        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $user = Auth::user();

        if ($user->type == 'admin') {
            $commandes = Facture::where('nom_entreprise',$nom_entreprise)->paginate(3);

            return view ('commandes.rap_commandes', compact('commandes'));
        }

        else{
            $commandes = Facture::where('nom_entreprise',$nom_entreprise)->where('nom_gestionnaire',$user->name)->paginate(3);
            return view('commandes.rap_commandes', compact('commandes'));
        }
    }


    // function  used to save customers orders and send invoice using email

    public function save_commandes(Request $request){
        //dd($request->all());
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'email_client'=>'required|email|max:255',
            'numero_client' => 'required|string|max:255',
            'moyen_paiement'=>'required',
            'total_achat'=>'required',
            'montant_paye' => 'required',
            'reste'=>'required',
        ]);

        $entreprise = Session::get('entreprise_active');
        $user = Auth::user();
        $status = "non-depose";

        $facture = Facture::create([
            'nom_client' => $request->nom_client,
            'email_client' => $request->email_client,
            'numero_client' => $request->numero_client,
            'moyen_paiement' => $request->moyen_paiement,
            'total_achat' => $request->total_achat,
            'reste' => $request->reste,
            'montant_paye' => $request->montant_paye,
            'status'=>$status,
            'nom_gestionnaire' => $user->name,
            'nom_entreprise' => $entreprise->nom_entreprise,
        ]);

        $numRows = (int) $request->input('numRows');

        for ($i=0; $i <= $numRows ; $i++) {
            if ($request->has("nom_produit$i") && $request->has("qte_commandee$i" ) && $request->has("prix_unitaire$i") && $request->has("total$i")) {
                Commande::create([
                    'id_facture' => $facture->id,
                    'nom_produit' => $request->input("nom_produit$i"),
                    'prix_unitaire' => $request->input("prix_unitaire$i"),
                    'qte_commandee' => $request->input("qte_commandee$i"),
                    'total' => $request->input("total$i"),
                    'nom_entreprise' => $entreprise->nom_entreprise,
                    'nom_gestionnaire' => $user->name,
                ]);
            }
        }

        if ($user->type == "gestionnaire" && $user->role == "secretaire") {

            $nom_admin = $user->nom_createur;
            $inf_admin = User::where('name',$nom_admin)->first();
            $email_admin = $inf_admin->email;

            Mail::to($email_admin)->send(new NotifiedAdmin($request->nom_client, $request->total_achat, $entreprise->nom_entreprise, $nom_admin));
            $importateurs = User::where('nom_entreprise',$entreprise->nom_entreprise)->where('role','importateur')->get();

            foreach ($importateurs as $importateur) {
                Mail::to($importateur->email)->send(new AlertImportateur($request->nom_client, $entreprise->nom_entreprise, $request->total_achat, $importateur->name));
            }

            $commandes = Commande::where('id_facture',$facture->id)->where('nom_entreprise',$entreprise->nom_entreprise)->get();
            $facture = Facture::where('id', $facture->id)->where('nom_entreprise',$entreprise->nom_entreprise)->first();

            $pdf = Pdf::loadView('commandes.facture_client', compact('entreprise','commandes','facture'));
            $pdf_path = public_path('factures/facture_'.$facture->id.'.pdf');
            $pdf->save($pdf_path);

            Mail::to($request->email_client)->send(new AlertClientMail($request->nom_client,$pdf_path, $entreprise->nom_entreprise,));
        }

        else if($user->type == "admin" && $user->role =="admin"){

            $importateurs = User::where('role','importateur')->where('nom_entreprise',$entreprise->nom_entreprise)->get();
            foreach ($importateurs as $importateur) {
                Mail::to($importateur->email)->send(new AlertImportateur($request->nom_client, $entreprise->nom_entreprise, $request->total_achat, $importateur->name));
            }

            $commandes = Commande::where('id_facture',$facture->id)->where('nom_entreprise',$entreprise->nom_entreprise)->get();
            $facture = Facture::where('id', $facture->id)->where('nom_entreprise',$entreprise->nom_entreprise)->first();

            $pdf = Pdf::loadView('commandes.facture_client', compact('entreprise','commandes','facture'));
            $pdf_path = public_path('factures/facture_'.$facture->id.'.pdf');
            $pdf->save($pdf_path);

            Mail::to($request->email_client)->send(new AlertClientMail($request->nom_client,$pdf_path, $entreprise->nom_entreprise,));
        }

        else if($user->type == "gestionnaire" && $user->role == "importateur"){

            $nom_admin = $user->nom_createur;
            $inf_admin = User::where('name',$nom_admin)->first();
            $email_admin = $inf_admin->email;

            Mail::to($email_admin)->send(new NotifiedAdmin($request->nom_client, $request->total_achat, $entreprise->nom_entreprise, $nom_admin));

            $commandes = Commande::where('id_facture',$facture->id)->where('nom_entreprise',$entreprise->nom_entreprise)->get();
            $facture = Facture::where('id', $facture->id)->where('nom_entreprise',$entreprise->nom_entreprise)->first();

            $pdf = Pdf::loadView('commandes.facture_client', compact('entreprise','commandes','facture'));
            $pdf_path = public_path('factures/facture_'.$facture->id.'.pdf');
            $pdf->save($pdf_path);

            Mail::to($request->email_client)->send(new AlertClientMail($request->nom_client,$pdf_path, $entreprise->nom_entreprise,));
        }

        return redirect('command_enregistrees')->with('save_succeed','votre commande a été enregistrée avec succès');
    }

    // function used to show customers orders
    public function voir_commandes($id){

        $entreprise = Session::get('entreprise_active');
        $factures = Facture::find($id);

        $commandes = Commande::where('id_facture',$factures->id)->where('nom_entreprise',$entreprise->nom_entreprise)->get();

        return view('commandes.voir_commandes', compact('factures', 'commandes','entreprise'));
    }

}
