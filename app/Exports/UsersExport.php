<?php

namespace App\Exports;

use App\Models\User;
use App\Models\users;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('nom','email','contact','residence','role')->where('type','gestionnaire')->get();
    }

    public function headings():array{
        return ["Nom", "Email", "Contact", "Quartier", "Role"];
    }
}
