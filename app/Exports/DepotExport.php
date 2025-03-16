<?php

namespace App\Exports;

use App\Models\Depot;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;

class DepotExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $entreprise = Session::get('entreprise_active');

        return Depot::select('nom_client','nom_agence','couleur_colis','moyen_transport','date_depart','status')->where('nom_entreprise', $entreprise->nom_entreprise)->get();
    }

    public function headings(): array{
        return ["nomClient","nomAgence","couleurColis","moyenTransport","dateDepart","status"];
    }
}
