<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use Livewire\Component;
use Livewire\WithPagination;

class RequestList extends Component
{
    public $perPage = 10;
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'RequestUpdated' => 'render'
    ];

    public function render()
    {
        return view('livewire.request-list',[
            'submissions' => Submission::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function getSubmission($id){
        $submission = Submission::find($id);
        $this->emit('getRequest', $submission);
    }

    public function getSubmissionP($id){
        $submission = Submission::find($id);
        $this->emit('getRequest', $submission);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
