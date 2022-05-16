<?php

namespace App\Http\Livewire\dossiers;

use App\Models\Beneficiaire;
use App\Models\Dossier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Dossiers extends Component
{
    use WithFileUploads;

    public $ids;
    public $date_soins;
    public $date_remboursement;
    public $statut;
    public $frais_rembourse;
    public $data = [];
    public $documents;
    public $frais_pharmacie;
    public $frais_analyse;
    public $frais_consultation;
    public $beneficiaire_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function validation(){
        $validateData = $this->validate([
            'frais_consultation' => 'required|numeric',
            'date_soins' => 'required',
            'documents.*' => 'image|max:2048',
            'documents' => 'required',
        ]);
    }

    public function resetFields(){
        $this->date_soins = '';
        $this->documents = null;
        $this->frais_pharmacie = 0;
        $this->frais_consultation = 0;
        $this->frais_analyse = 0;
    }

    public function store(){
        $ds = new Dossier();
        $this->validation();
        if($this->documents != null){
            foreach ($this->documents as $doc ) {
                // $name = 'dossiers'.DIRECTORY_SEPARATOR.Auth::user()->name.DIRECTORY_SEPARATOR.$doc->getClientOriginalName();
                $ext = $doc->getClientOriginalExtension();
                $name = date('YmdHis').rand(1,9999).'.'.$ext;
                $doc->storeAs('/dossiers/'.Auth::user()->name, $name, 'public');
                $this->data[] = 'dossiers'.DIRECTORY_SEPARATOR.Auth::user()->name.DIRECTORY_SEPARATOR.$name;
            }
        }
        $ds->num_dossier = mt_rand(1000, 9999);
        $ds->date_depot =  Carbon::now();
        $ds->date_soins = $this->date_soins;
        $ds->documents = json_encode($this->data);
        $ds->statut = 'En Cours';
        $ds->beneficiaire_id = $this->beneficiaire_id;
        $ds->frais_consultation = $this->frais_consultation;
        $ds->frais_analyse = $this->frais_analyse;
        $ds->frais_pharmacie = $this->frais_pharmacie;
        $ds->frais_rembourse = 0;
        $ds->total = $this->frais_pharmacie + $this->frais_analyse + $this->frais_consultation;
        $ds->user_id = Auth::user()->id;
        $ds->save();      
        $this->resetFields();
        $this->dispatchBrowserEvent('add-success');

    }

    public function edit($id){
        $Dossier = Dossier::where('id', $id)->first();
        $this->ids = $Dossier->id;
        $this->date_soins = $Dossier->date_soins;
        $this->beneficiaire_id = $Dossier->beneficiaire_id;
        $this->frais_consultation = $Dossier->frais_consultation;
        $this->frais_analyse = $Dossier->frais_analyse;
        $this->frais_pharmacie = $Dossier->frais_pharmacie;
    }

    public function update(){
        $this->validation();
        if($this->ids){
            $ds = Dossier::find($this->ids);
            $ds->update([
                'date_soins' => $this->date_soins,
                'beneficiaire_id' =>  $this->beneficiaire_id,
                'frais_consultation' => $this->frais_consultation,
                'frais_analyse' => $this->frais_analyse,
                'frais_pharmacie' => $this->frais_pharmacie,
                'total' => $this->frais_pharmacie + $this->frais_analyse + $this->frais_consultation
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
        $ben = Dossier::findOrFail($this->ids);
        $ben->delete();
        $this->dispatchBrowserEvent('deleted');
    }
    
    public function render()
    {
        $benef = Beneficiaire::where('user_id','=',Auth::user()->id)
                        ->where('statut','=','Actif')
                        ->get();
        $ds = Dossier::where('user_id', '=' ,Auth::user()->id)->get();
        return view('livewire.admin.dossier.dossiers', ['ds' => $ds, 'benef' => $benef]);
    }
}
