<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Suplier;
use Livewire\WithPagination;


class SuplierList extends Component
{
    public $suplierId;
    public $suplierUpdateStatus = false;
    public $perPage = 10;
    protected $listeners = [
        'SuplierUpdated' => 'render',
        'SuplierStore' => 'render'
    ];
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.suplier-list', [
            'supliers' => Suplier::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function deleteConfirm($id){
        $this->emit('suplierUpdateStatusFalse');
        $this->suplierId = $id;
    }

    public function destroy(){
        $suplier = Suplier::where('id', $this->suplierId)->first();
        $suplier->delete();
        $this->suplierId = NULL;

        $this->dispatchBrowserEvent('success', ['message'=>'Suplier berhasil dihapus !']);

        $this->emit('SuplierStore');
    }

    public function getSuplier($id){
        $this->emit('suplierUpdateStatus');
        $suplier = Suplier::find($id);
        $this->emit('getSuplier', $suplier);
    }

    public function cancel(){
        $this->suplierId = NULL;
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }
}
