<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $email;
    public $name;
    public $password;
    public $position_id;

    public function render()
    {
        return view('livewire.user-create',[
            'positions' => Position::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|integer|max:99',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|max:99'
        ]);

        User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'position_id' => $this->position_id,
            'password' => Hash::make($this->password)
        ]);

        $this->name = NULL;
        $this->email = NULL;
        $this->position_id = NULL;
        $this->password = NULL;

        $this->dispatchBrowserEvent('success', ['message'=>'Pengguna berhasil ditambahkan !']);
        $this->emit('UserStore');
    }
}
