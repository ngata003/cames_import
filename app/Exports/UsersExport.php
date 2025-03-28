<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name','email','contact','residence','role')->where('type','gestionnaire')->get();
    }

    public function headings():array{
        return ["Nom", "Email", "Contact", "Quartier", "Role"];
    }
}
