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
            'name' => 'required|string|max:255|unique:positions,name'
        ]);

        Position::Create([
            'name' => $this->name
        ]);

        $this->name = NULL;

        $this->dispatchBrowserEvent('success', ['message'=>'Jabatan berhasil ditambahkan !']);

        $this->emit('PositionStore');
    }
}
