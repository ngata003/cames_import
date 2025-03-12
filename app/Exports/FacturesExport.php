<?php

namespace App\Exports;

use App\Models\Facture;
use Maatwebsite\Excel\Concerns\FromCollection;
use Session;

class FacturesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;
        return Facture::select('nom_client','email_client','numero_client','moyen_paiement','total_achat','montant_paye','reste')->where('nom_entreprise', $nom_entreprise)->get();
    }

    public function headings(): array{
        return ["NomClient","EmailClient","ContactClient","MoyenPaiement","TotalAchat","MontantPaye","Reste"];
    }
}
