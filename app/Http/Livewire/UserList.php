<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserList extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-list',[
            'users' => User::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate(10)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
