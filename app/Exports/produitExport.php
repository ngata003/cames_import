<?php

namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Session;

class produitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $nom_entreprise = Session::get('entreprise_active')->nom_entreprise;
        return Produit::select('nom_produit','prix_unitaire')->where('nom_entreprise',$nom_entreprise)->get();
    }

    public function headings(): array{
        return ["nomClient","prixUnitaire"];
    }
}
