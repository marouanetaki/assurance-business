<?php

namespace App\Http\Livewire;

use App\Exports\UsersExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Users extends Component
{
    public function export(){
        return Excel::download(new UsersExport, 'Listes_Adherent.xlsx');
    }
}
