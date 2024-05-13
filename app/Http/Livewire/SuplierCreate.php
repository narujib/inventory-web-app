<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Suplier;



class SuplierCreate extends Component
{
    public $name;
    public $email;
    public $alamat;
    public $telepon;

    public function render()
    {
        return view('livewire.suplier-create');
    }

    public function store(){
        $this->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255|unique:supliers,telepon',
            'email' => 'string|email|max:255|unique:supliers,email'
        ]);

        Suplier::Create([
            'name' => $this->name,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'email' => $this->email
        ]);

        $this->name = NULL;
        $this->email = NULL;
        $this->telepon = NULL;
        $this->alamat = NULL;

        session()->flash('success', 'Berhasil menambahkan suplier');

        $this->emit('SuplierStore');
    }
}
