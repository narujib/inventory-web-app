<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;

class PositionCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.position-create');
    }

    public function store(){
        $this->validate([
            'name' => 'unique|required|string|max:255'
        ]);

        Position::Create([
            'name' => $this->name
        ]);

        $this->name = NULL;

        session()->flash('success', 'Berhasil menambahkan posisi');

        $this->emit('PositionStore');
    }
}
