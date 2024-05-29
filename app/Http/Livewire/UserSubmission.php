<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use Livewire\Component;
use Livewire\WithPagination;

class UserSubmission extends Component
{
    use WithPagination;
    
    public $perPage = 5;
    public $filterPageStatus = null;
    public $search = '';
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-submission',[
            'submissions' => Submission::whereHas('inventory', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->with(['user', 'inventory'])
            ->where('user_id', auth()->id())
            ->when($this->filterPageStatus, function ($query) {
                $query->where('status', $this->filterPageStatus);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage)->onEachSide(1)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingfilterPageStatus()
    {
        $this->resetPage();
    }

    public function updatingperPage()
    {
        $this->resetPage();
    }
}
