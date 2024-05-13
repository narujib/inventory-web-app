<?php

namespace App\Http\Livewire;

use App\Models\Position;
use App\Models\User;
use Livewire\Component;

class UserUpdate extends Component
{
    public $userId;
    public $email;
    public $name;
    // public $password;
    public $position_id;

    protected $listeners = [
        'dataUser' => 'showUser'
    ];

    public function render()
    {
        return view('livewire.user-update',[
            'positions' => Position::all()
        ]);
    }

    public function showUser($user){
        // dd($user);
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->email = $user['email'];
        // $this->password = $user['password'];
        $this->position_id = $user['position_id'];
    }

    public function update(){
        $this->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->userId
            // 'password' => 'required|string|min:8'
        ]);

        if ($this->userId){
            $user = User::find($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'position_id' => $this->position_id
            ]);

            $this->name = NULL;
            $this->email = NULL;
            $this->position_id = NULL;

            session()->flash('success', 'User berhasil diedit');

        }
        $this->emit('UserUpdated');
    }
}