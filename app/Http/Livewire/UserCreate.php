<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $email;
    public $name;
    public $password;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->name = NULL;
        $this->email = NULL;
        $this->password = NULL;

        session()->flash('success', 'User berhasil dibuat');

        $this->emit('UserStore');
    }
}
