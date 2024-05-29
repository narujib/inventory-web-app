<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SubmissionList extends Component
{
    use WithPagination;

    public $submissionId;
    public $submissionUpdateStatus = false;
    
    public $perPage = 5;
    public $filterPageStatus = null;
    public $filterPageUser = null;
    public $filterPageJenis = null;
    public $search = '';
    
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'SubmissionUpdated' => 'render',
        'SubmissionStore' => 'render'
    ];

    public function render()
    {
        return view('livewire.submission-list',[
            'users' => User::all(),
            'submissions' => Submission::whereHas('inventory', function($q){
                $q->where('name','like','%'.$this->search.'%');
                if ($this->filterPageJenis) {
                    $q->where('jenis', $this->filterPageJenis);
                }
            })
            ->with(['user', 'inventory'])
            ->when($this->filterPageUser,function($query){
                $query->where('user_id', $this->filterPageUser);
            })
            ->when($this->filterPageStatus,function($query){
                $query->where('status', $this->filterPageStatus);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage)
        ]);
    }

    public function getSubmission($inventory_id)
    {
        $this->emit('submissionUpdateStatus');
        $submission = Submission::where('inventory_id', $inventory_id)->first();
        $this->emit('getSubmission', $submission);
    }

    public function deleteConfirm($inventory_id)
    {
        $this->submissionId = $inventory_id;
    }

    public function destroy()
    {
        if($this->submissionId){
            $i = Inventory::where('id', $this->submissionId)->first();
            $x = Submission::where('inventory_id', $this->submissionId)->first();
            $usId = Auth::id();
            
            if ($x && $i) {
                $user = $x->user_id;
                $status = $x['status'];

                if ($usId == $user && $status == 1) {
                    $x->delete();
                    $i->delete();
                    $this->dispatchBrowserEvent('success', ['message' => 'Pengajuan berhasil dihapus!']);
                } else {
                    $this->dispatchBrowserEvent('warning', ['message' => 'Tindakan ini tidak dapat dilanjutkan!']);
                }
            }
        }        
        $this->submissionId = NULL;
        
        $this->emit('SubmissionStore');
    }

    public function cancel()
    {
        $this->submissionId = NULL;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingfilterPageStatus()
    {
        $this->resetPage();
    }

    public function updatingfilterPageUser()
    {
        $this->resetPage();
    }

    public function updatingfilterPageJenis()
    {
        $this->resetPage();
    }

    public function updatingperPage()
    {
        $this->resetPage();
    }
}
