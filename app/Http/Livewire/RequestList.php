<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use Livewire\Component;
use Livewire\WithPagination;

class RequestList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $filterPage = null;
    public $search = '';
    
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'RequestUpdated' => 'render'
    ];

    public function render()
    {
        return view('livewire.request-list',[
            'submissions' => Submission::whereHas('inventory', function($q){
                $q->where('name','like','%'.$this->search.'%');
                })
                ->with(['user', 'inventory'])
                ->when($this->filterPage,function($query){
                    $query->where('status', $this->filterPage);
                })->paginate($this->perPage)
        ]);
    }

    public function getSubmission($id
    ){
        $submission = Submission::find($id);
        $this->emit('getRequest', $submission);
    }

    public function getSubmissionS($id)
    {
        $submission = Submission::find($id);
        $this->emit('getRequestS', $submission);
    }

    public function getSubmissionP($id)
    {
        $submission = Submission::find($id);
        $this->emit('getRequestP', $submission);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
