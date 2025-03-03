<?php

namespace App\Http\Controllers;

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
}
