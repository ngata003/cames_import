<?php

namespace App\Http\Controllers;

use App\Models\notification;
use App\Models\Produit;
use Auth;
use Illuminate\Http\Request;
use Session;

class ProduitController extends Controller
{
    //

    public function product_view(){
        $nom_entreprise = Session::get('entreprise_active')->nom_entreprise;
        $user = Auth::user();

        $produits = Produit::where('nom_entreprise',$nom_entreprise)->paginate(5);
        return view ('produits.add_produits', compact('produits'));
    }

    public function add_products(Request $request){

        $user = Auth::user();
        $nom_entreprise = Session::get('entreprise_active')->nom_entreprise;
        $nom_gestionnaire = $user->name;
        $messages = [
            'nom_produit.required'=>'entrez un nom de produit',
            'nom_produit.regex' => 'veuillez entrer un nom valide de produit du genre: aaaTTTT',

            'prix_unitaire.regex' => 'veuillez entrer une valeur du prix de produit',
            'image_produit.mimes' => 'veuillez entrer une image ayant l\'extension jpeg, jpg, png, svg, gif',
        ];

        $request->validate([
            'nom_produit'=>'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'prix_unitaire'=>'required',
            'image_produit'=>'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ], $messages);

        if ($request->hasFile('image_produit')) {
            $imageFile = $request->file('image_produit');
            $imageProduit = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images'),$imageProduit);
        }

        $produit = new Produit();

        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix_unitaire = $request->input('prix_unitaire');
        $produit->image_produit = $imageProduit;
        $produit->nom_gestionnaire = $nom_gestionnaire;
        $produit->nom_entreprise = $nom_entreprise;

        $produit->save();

        $description = "le gestionnaire:" .$nom_gestionnaire. "vient d'ajouter le produit".  $produit->nom_produit . "  veuillez verifier";


        $notification = new notification();

        $notification->nom_gestionnaire = $nom_gestionnaire;
        $notification->description = $description;
        $notification->nom_entreprise = $nom_entreprise;
        $notification->status = "non_lu";

        if ($user->role == "secretaire") {
            $notification->destinataire = "admin-importateur";
        }

        else if($user->role == "admin"){
            $notification->destinataire = "secretaire-importateur";
        }
        else if($user->role == "importateur"){
            $notification->destinataire = "admin-secretaire";
        }

        $notification->save();

        return back()->with('status','produit enregistré avec succès');
    }

    public function updateProduits(Request $request, $id){
        $produit = Produit::find($id);

        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix_unitaire = $request->input('prix_unitaire');
        if ($request->hasFile('image_produit')) {
            if ($produit->image_produit) {
                $oldImagePath = public_path('assets/images/' . $produit->image_produit);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image_produit = $request->file('image_produit');
            $prodPicture = time() . '.' . $image_produit->getClientOriginalExtension();
            $image_produit->move(public_path('/assets/images'), $prodPicture);

            $produit->image_produit = $prodPicture;
        }

        $produit->save();
        return back()->with('status_updated','le produit a bien été modifié ');

    }

    public function deleteProduits($id){
        $produit = Produit::find($id);
        if ($produit) {
            $produit->delete();

            return back()->with('deleted_success','le produit vient d\'etre supprimé avec succès');
        }
    }

    public function research_products(){
        $nom_entreprise = Session::get('entreprise_active')->nom_entreprise;
        $research = $_GET['nom_produit'];

        $produits = Produit::where('nom_produit','LIKE','%'.$research.'%')->where('nom_entreprise',$nom_entreprise)->get();

        return view('produits.result_research', compact('produits'));
    }

    public function autoCompletion_produits(Request $request){

        $entreprise = Session::get('entreprise_active');
        $query = $request->get('query');

        if(!$query){
            return response()->json([]);
        }

        $produits = Produit::where('nom_produit','LIKE',"%{$query}%")->where('nom_entreprise',$entreprise->nom_entreprise)->get(['nom_produit','prix_unitaire']);

        return response()->json($produits);
    }

}
