<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Psy\Readline\Hoa\Console;

use function Termwind\render;

class UserList extends Component
{
    use WithPagination;

    public $userUpdateStatus = false;
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $userId;

    protected $listeners = [
        'UserUpdated' => 'render',
        'UserStore' => 'render'
    ];

    public function render()
    {
        return view('livewire.user-list',[
            'users' => User::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function getUser($id)
    {
        $this->emit('userUpdateStatus');
        $user = User::find($id);
        $this->emit('getUser', $user);
    }

    public function deleteConfirm($id)
    {
        $this->userId = $id;
    }

    public function destroy()
    {
        $user = User::where('id', $this->userId)->first();
        $xId = $user->id;
        $userId = Auth::id();
        if($userId != $xId){
            $this->dispatchBrowserEvent('success', ['message'=>'Pengguna berhasil dihapus !']);
            $user->delete();
        }else{
            $this->dispatchBrowserEvent('warning', ['message'=>'Maaf, Pengguna tidak dapat dihapus !']);
        }
        $this->emit('UserStore');
    }

    public function cancel()
    {
        $this->userId = NULL;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
