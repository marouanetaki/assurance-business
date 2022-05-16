<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Beneficiaire;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Beneficiaires extends Component
{
    use WithFileUploads;
    
    public $ids;
    public $date_naissance;
    public $data;
    public $lien_parente;
    public $document;
    public $nom;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function resetFields(){
        $this->nom = '';
        $this->date_naissance = '';
        $this->document = null;
    }

    public function validation(){
        $validateData = $this->validate([
            'nom' => 'required',
            'date_naissance' => 'required',
            'lien_parente' => 'required',
            'document' => 'required|image|max:2048',
        ]);
    }

    public function store(){
        $this->validation();
        $date = new Carbon($this->date_naissance);
        if(Carbon::now()->year - $date->year > 21 && $this->lien_parente == 'Enfant'){
            $this->dispatchBrowserEvent('age-old');
        }
        else{
            if($this->document != null){
                $ext = $this->document->getClientOriginalExtension();
                $name = date('YmdHis').rand(1,9999).'.'.$ext;
                $this->document->storeAs('/beneficiaire/'.Auth::user()->name, $name, 'public');
                $this->data = 'beneficiaire'.DIRECTORY_SEPARATOR.Auth::user()->name.DIRECTORY_SEPARATOR.$name;
            }
            Beneficiaire::create([
                'nom' => $this->nom, 
                'date_naissance' => $this->date_naissance,
                'statut' => 'Inactif',
                'document' => $this->data,
                'lien_parente' => $this->lien_parente,
                'user_id' => Auth::user()->id
             ]);
            $this->resetFields();
            $this->dispatchBrowserEvent('add-success');
        }
    }

    public function edit($id){
        $beneficiaire = Beneficiaire::where('id', $id)->first();
        $this->ids = $beneficiaire->id;
        $this->nom = $beneficiaire->nom;
        $this->lien_parente = $beneficiaire->lien_parente;
        $this->date_naissance = $beneficiaire->date_naissance;
    }

    public function update(){
        if($this->ids){
            $Beneficiaire = Beneficiaire::find($this->ids);
            $Beneficiaire->update([
                'nom' => $this->nom, 
                'date_naissance' => $this->date_naissance,
                'lien_parente' => $this->lien_parente,
            ]);
            $this->resetFields();
            $this->dispatchBrowserEvent('update-success');
        }
        else
            $this->dispatchBrowserEvent('erreur');
    }

    public function confirmDelete($id)
    {
        $this->ids = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }
    public function delete()
    {
        $ben = Beneficiaire::findOrFail($this->ids);
        $ben->delete();
        $this->dispatchBrowserEvent('deleted');
    }
    
    public function render()
    {
        $benef = Beneficiaire::where('user_id', '=' ,Auth::user()->id)->get();
        return view('livewire.admin.beneficiaire.beneficiaires', ['benef' => $benef]);
    }
}
