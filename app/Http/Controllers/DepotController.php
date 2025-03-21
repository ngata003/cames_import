<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Depot;
use App\Models\Facture;
use App\Models\Retrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class DepotController extends Controller
{
    //
    public function save_depot(Request $request){

        $request->validate([
            'nom_client' =>'required',
            'nom_agence' => 'required',
            'date_depart' => 'required',
            'couleur_colis' => 'required|string|max:255',
            'moyen_transport' => 'required',
            'status' => 'required',
            'duree_trajet' => 'required',
            'image_colis' => '',
        ]);

        $entreprise = Session::get('entreprise_active');
        $user = Auth::user();

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
        $depot->nom_gestionnaire = $user->name;
        $depot->nom_entreprise = $entreprise->nom_entreprise;

        $depot->save();

        $mod_facture = Facture::where('nom_ client',$request->input('nom_client'))->first();
        $mod_facture->status = 'depose';
        $mod_facture->save();

        $date_depart = Carbon::parse($request->input('date_depart'));
        $duree = $request->input('duree_trajet');

        $date_retrait = $date_depart->addDays($duree);
        Retrait::create([
            'nom_client' =>$request->nom_client,
            'nom_agence' => $request->nom_agence,
            'date_retrait' =>$request->date_retrait,
            'nom_entreprise' => $entreprise->nom_entreprise,
            'nom_gestionnaire' => $user->name,
            'status'=>'non_retire',
        ]);


        return back()->with('status_save','agence enregistrée avec succès');
    }

    public function deposer_colis(){

        $entreprise = Session::get('entreprise_active');

        $nom_entreprise = $entreprise->nom_entreprise;

        $lundiDernier = Carbon::now()->startOfWeek()->subWeek();
        $dimancheDernier = Carbon::now()->endOfWeek()->subWeek();

        $depot = Depot::where('nom_entreprise',$nom_entreprise)->paginate(4);

        foreach ($depot as $dept) {
            $date_depart = Carbon::parse($dept->date_depart);
            $duree_trajet = $dept->duree_trajet;
            $date_actuelle = Carbon::now();

            $jours_ecoules = $date_depart->diffInDays($date_actuelle,false);

            if($jours_ecoules < 0 ){
                $dept->progression = 0;
            }

            else if($jours_ecoules >= $duree_trajet){
                $dept->progression = 100;
            }

            else{
                $depot->progression = ($jours_ecoules/$duree_trajet)*100;
            }
        }

        $clients =  Facture::whereBetween('created_at',[$lundiDernier, $dimancheDernier])->select('nom_client')->distinct()->orderBy('nom_client','asc')->where('nom_entreprise',$nom_entreprise)->get();
        $agences = Agence::where('nom_entreprise',$nom_entreprise)->get();

        return view('agences.depot_colis', compact('clients','agences', 'depot'));
    }


    // fonction pour supprimer les depots

    public function delete_depot($id){
        $depot = Depot::find($id);

        if ($depot) {
            $depot->delete();
            return back()->with('status_delete','depot supprimé avec succès');
        }
    }

// fonction pour modifier les depots 
    public function modifier_depots(Request $request, $id){
        $depot = Depot::find($id);

        $depot->nom_client = $request->nom_client;
        $depot->nom_agence = $request->nom_agence;
        $depot->duree_trajet = $request->duree_trajet;
        $depot->moyen_transport = $request->moyen_transport;
        $depot->couleur_colis = $request->couleur_colis;
        $depot->date_depart = $request->date_depart;

        if ($request->hasFile('image_colis')) {
            if ($depot->image_colis) {
                $oldImagePath = public_path('assets/images/' . $depot->image_colis);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $uploadedFile = $request->file('image_colis'); 
            $colisImage = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('/assets/images'), $colisImage);

            $depot->image_colis = $colisImage; 
        }

        $depot->save();

        return back()->with('updated_status', 'depot modifié avec succès');

    }

}
