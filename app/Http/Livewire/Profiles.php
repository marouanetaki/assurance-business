<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profiles extends Component
{
    public $ids;
    public $email;
    public $name;
    public $date_naissance;
    public $entreprise;
    public $tel;
    public $password;
    public $usr;

    public function validation(){
        $validateData = $this->validate([
            'name' => ['required', 'string'],
            'date_naissance' => ['required'],
            'entreprise' => ['required'],
            'email' => ['required', 'string', 'email'],
            'tel' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    public function update(){
        $this->validation();
        if($this->ids){
            $prs = User::find($this->ids);
            $prs->update([
                'email' => $this->email,
                'tel' => $this->tel,
                'entreprise' => $this->entreprise,
                'date_naissance' => $this->date_naissance,
                'name' => $this->name, 
                'password' => Hash::make($this->password),
            ]);
            $this->dispatchBrowserEvent('update-success');
        }
        else
            $this->dispatchBrowserEvent('erreur');
    }

    public function mount(){
        $this->usr = User::where('id','=',Auth::user()->id)->first();
        $this->email = $this->usr->email;
        $this->ids = $this->usr->id;
        $this->name = $this->usr->name;
        $this->entreprise = $this->usr->entreprise;
        $this->tel = $this->usr->tel;
        $this->date_naissance = $this->usr->date_naissance;
    }

    public function render()
    {
        return view('livewire.admin.profile.profiles', ['usr' => $this->usr]);
    }
}
