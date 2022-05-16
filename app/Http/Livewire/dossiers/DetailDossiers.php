<?php

namespace App\Http\Livewire\dossiers;

use App\Models\Dossier;
use Livewire\Component;

class DetailDossiers extends Component
{
    public $dossier;
    public $ids;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function confirmDelete($id)
    {
        $this->ids = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function delete()
    {
        $ds = Dossier::findOrFail($this->ids);
        $ds->delete();
        $this->dispatchBrowserEvent('deleted');
        return redirect()->route('dossier.index');
    }

    public function mount($id)
    {
        $this->dossier = Dossier::where('id', $id)->first();
    }


    public function render()
    {
        return view('livewire.admin.dossier.detail-dossiers',['dossier' => $this->dossier]);
    }
}
