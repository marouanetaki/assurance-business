<?php

namespace App\Http\Livewire;

use App\Models\Accident;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Accidents extends Component
{
    public $ids;
    public $lieu;
    public $heure;
    public $tel;
    public $cause;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function resetFields(){
        $this->cause = '';
        $this->heure = '';
        $this->lieu = '';
        $this->tel = '';
    }

    public function validation(){
        $validateData = $this->validate([
            'lieu' => 'required',
            'heure' => 'required',
            'cause' => 'required',
            'tel' => 'required',
        ]);
    }

    public function store(){
        $this->validation();
        Accident::create([
            'lieu' => $this->lieu, 
            'heure' => $this->heure,
            'cause' => 'cause',
            'tel' => $this->tel,
            'user_id' => Auth::user()->id
         ]);
        $this->resetFields();
        $this->dispatchBrowserEvent('add-success');
    }

    public function edit($id){
        $acd = Accident::where('id', $id)->first();
        $this->ids = $acd->id;
        $this->lieu = $acd->lieu;
        $this->cause = $acd->cause;
        $this->tel = $acd->tel;
        $this->heure = $acd->heure;
    }

    public function update(){
        if($this->ids){
            $Accident = Accident::find($this->ids);
            $this->validation();
            $Accident->update([
                'lieu' => $this->lieu, 
                'heure' => $this->heure,
                'cause' => $this->cause,
                'tel' => $this->tel,
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
        $ben = Accident::findOrFail($this->ids);
        $ben->delete();
        $this->dispatchBrowserEvent('deleted');
    }
    
    public function render()
    {
        $acd = Accident::where('user_id', '=' ,Auth::user()->id)->get();
        return view('livewire.admin.accident.accidents', ['acd' => $acd]);
    }
}
