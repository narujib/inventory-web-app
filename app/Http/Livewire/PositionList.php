<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class PositionList extends Component
{
    public $positionUpdateStatus = false;
    public $perPage = 10;
    protected $listeners = [
        'PositionUpdated' => 'render',
        'PositionStore' => 'render'
    ];
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.position-list',[
            'positions' => Position::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function getPosition($id){
        $this->emit('positionUpdateStatus');
        $position = Position::find($id);
        $this->emit('getPosition', $position);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
