<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return DB::table('roles')->join('users', function($join){
            $join->on('roles.id', '=', 'users.role_id')
                 ->where('roles.name', '=', 'Adhérent');
        })
        ->select('users.name','email','date_naissance','entreprise','tel','roles.display_name','users.created_at')
        ->get();
    }
}
