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
        $dateDuJour = Carbon::now()->toDateString(); // Format: 23-03-2025

        $donnees = Retrait::whereDate('date_retrait',$dateDuJour)
            ->where('nom_entreprise', $entreprise->nom_entreprise)
            ->get();

        return view('retraits.retraits',compact('donnees'));
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
