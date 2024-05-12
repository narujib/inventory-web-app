<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Suplier;
use Livewire\WithPagination;


class SuplierList extends Component
{
    public $perPage = 10;
    protected $listeners = ['SuplierStore' => 'render'];
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.suplier-list', [
            'supliers' => Suplier::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }
}
