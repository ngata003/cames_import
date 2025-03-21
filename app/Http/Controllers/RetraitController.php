<?php

namespace App\Http\Controllers;

use App\Models\Retrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class RetraitController extends Controller
{
    //
    public function affichage_retraits(){
        $entreprise = Session::get('entreprise_active');
        $date_actuelle = Carbon::now();

        $donnees = Retrait::where('date_retrait',$date_actuelle)->where('nom_entreprise',$entreprise->nom_entreprise)->paginate(4);
    }

    public function update_retrait(Request $request, $id){
        $retrait = Retrait::find($id);

        $retrait->nom_client = $request->nom_client;
        $retrait->nom_agence = $request->nom_agence;

        $retrait->save();

        return back()->with('updated_status','modification effectuée avec succès');
    }

    public function delete_retrait($id){
        $retrait = Retrait::find($id);

        $retrait->delete();
    }

    public function research_retraits(){
        $research = $_GET['research'];

        $retraits = Retrait::where('nom_client','LIKE','%'.$research.'%')->orWhere('nom_agence','LIKE','%'.$research.'%')->paginate(4);
        return view('retraits.research', compact('retraits'));
    }

    public function activerRetrait($id){
        $retrait = Retrait::find($id);

        $retrait->status = "retire";

        $retrait->save();

        return back()->with('status_retire','commande retire avec succes');
    }
}
