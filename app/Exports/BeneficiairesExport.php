<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class BeneficiairesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Beneficiare::all();
        return DB::table('users')->join('beneficiaires', function($join){
            $join->on('users.id', '=', 'beneficiaires.user_id');
        })
        ->selectRaw('nom, statut, lien_parente, beneficiaires.date_naissance, name, user_id')
        ->orderby('user_id')
        ->get();
    }
}
