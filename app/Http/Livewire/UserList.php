<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Psy\Readline\Hoa\Console;

use function Termwind\render;

class UserList extends Component
{
    public $userId;
    public $userUpdateStatus = false;
    public $perPage = 10;
    protected $listeners = [
        'UserUpdated' => 'render',
        'UserStore' => 'render'
    ];
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-list',[
            'users' => User::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function getUser($id){
        // dd($id);
        $this->emit('userUpdateStatus');
        $user = User::find($id);
        $this->emit('getUser', $user);
    }

    public function deleteConfirm($id){
        $this->userId = $id;
    }

    public function destroy(){
        $user = User::where('id', $this->userId)->first();
        $user->delete();
        $this->userId = NULL;

        $this->dispatchBrowserEvent('success', ['message'=>'Pengguna berhasil dihapus !']);

        $this->emit('UserStore');
    }

    public function cancel(){
        $this->userId = NULL;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
