<?php

namespace App\Http\Livewire;

use App\Models\Beneficiaire;
use App\Models\Prise;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Prises extends Component
{

    use WithFileUploads;

    public $ids;
    public $beneficiaire_id;
    public $clinique;
    public $type_operation;
    public $data;
    public $document;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function resetFields(){
        $this->clinique = '';
        $this->type_operation = '';
        $this->beneficiaire_id = null;
        $this->document = null;
    }

    public function validation(){
        $validateData = $this->validate([
            'clinique' => 'required',
            'type_operation' => 'required',
            'beneficiaire_id' => 'required',
            'document' => 'required|image|max:2048',
        ]);
    }

    public function store(){
        $this->validation();
        if($this->document != null){
            $ext = $this->document->getClientOriginalExtension();
            $name = date('YmdHis').rand(1,9999).'.'.$ext;
            $this->document->storeAs('/prise_en_charge/'.Auth::user()->name, $name, 'public');
            $this->data = 'prise_en_charge'.DIRECTORY_SEPARATOR.Auth::user()->name.DIRECTORY_SEPARATOR.$name;
        }
        Prise::create([
            'clinique' => $this->clinique, 
            'type_operation' => $this->type_operation, 
            'beneficiaire_id' => $this->beneficiaire_id,
            'document' => $this->data,
            'user_id' => Auth::user()->id
         ]);
        $this->resetFields();
        $this->dispatchBrowserEvent('add-success');
    }

    public function edit($id){
        $Prise = Prise::where('id', $id)->first();
        $this->ids = $Prise->id;
        $this->clinique = $Prise->clinique;
        $this->type_operation = $Prise->type_operation;
        $this->beneficiaire_id = $Prise->beneficiaire_id;
    }

    public function update(){
        if($this->ids){
            $prs = Prise::find($this->ids);
            $prs->update([
                'clinique' => $this->clinique, 
                'type_operation' => $this->type_operation, 
                'beneficiaire_id' => $this->beneficiaire_id,
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
        $prs = Prise::findOrFail($this->ids);
        $prs->delete();
        $this->dispatchBrowserEvent('deleted');
    }

    public function render()
    {
        $benef = Beneficiaire::where('user_id','=',Auth::user()->id)
                        ->where('statut','=','Actif')
                        ->get();
        $prs = Prise::where('user_id','=',Auth::user()->id)->get();
        return view('livewire.admin.prise.prises', ['prs' => $prs, 'benef' => $benef]);
    }
}
