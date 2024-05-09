<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserList extends Component
{
    public $perPage = 10;
    protected $listeners = ['UserStore' => 'render'];
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-list',[
            'users' => User::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
