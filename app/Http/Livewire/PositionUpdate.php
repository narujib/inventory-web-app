<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;

class PositionUpdate extends Component
{
    public $positionId;
    public $name;

    protected $listeners = [
        'dataPosition' => 'showPosition'
    ];

    public function render()
    {
        return view('livewire.position-update');
    }

    public function showPosition($position){
        $this->positionId = $position['id'];
        $this->name = $position['name'];
    }

    public function update(){
        $this->validate([
            'name' => 'required|string|max:255|unique:positions,name,'.$this->positionId
        ]);

        if($this->positionId){
            $position = Position::find($this->positionId);
            $position->update([
                'name' => $this->name
            ]);

            $this->name = NULL;

            // session()->flash('success', 'Posisi berhasil diedit');
            $this->emit('positionUpdateStatusFalse');
            $this->dispatchBrowserEvent('success', ['message'=>'Jabatan berhasil diubah !']);
        }
        $this->emit('PositionUpdated');
    }

    public function cancel(){
        $this->name = NULL;
        
        $this->emit('positionUpdateStatusFalse');
    }
}
