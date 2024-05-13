<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Suplier;
use Livewire\WithPagination;


class SuplierList extends Component
{
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

    public function getSuplier($id){
        $this->emit('suplierUpdateStatus');
        $suplier = Suplier::find($id);
        $this->emit('getSuplier', $suplier);
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }
}
