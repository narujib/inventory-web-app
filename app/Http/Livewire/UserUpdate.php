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

    public function showUser($user)
    {
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->position_id = $user['position_id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->userId
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

            $this->emit('userUpdateStatusFalse');
            $this->dispatchBrowserEvent('success', ['message'=>'Pengguna berhasil diubah !']);
        }
        $this->emit('UserUpdated');
    }

    public function cancel(){
        $this->name = NULL;
        $this->email = NULL;
        $this->position_id = NULL;
        
        $this->emit('userUpdateStatusFalse');
    }
}
