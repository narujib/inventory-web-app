<?php

namespace App\Http\Livewire;

use App\Models\Position;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PositionList extends Component
{
    public $positionId;
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

    public function deleteConfirm($id){
        $this->emit('positionUpdateStatusFalse');
        $this->positionId = $id;
    }

    public function destroy(){
        
        $position = Position::where('id', $this->positionId)->first();
        $xId = $position->id;
        // dd($xId);

        $userIds = User::pluck('position_id')->toArray();
        // dd($userIds);
        
        if(!in_array($xId, $userIds)){
            $position->delete();
            $this->dispatchBrowserEvent('success', ['message'=>'Jabatan berhasil dihapus !']);
        }else{
            $this->dispatchBrowserEvent('warning', ['message'=>'Maaf, Jabatan ini tidak kosong !']);
        }

        $this->positionId = NULL;

        $this->emit('PositionStore');
    }

    public function cancel(){
        $this->positionId = NULL;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
