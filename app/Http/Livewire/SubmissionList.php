<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SubmissionList extends Component
{
    use WithPagination;

    public $submissionId;
    public $submissionUpdateStatus = false;
    
    public $perPage = 5;
    public $search = '';
    
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'SubmissionUpdated' => 'render',
        'SubmissionStore' => 'render'
    ];

    public function render()
    {
        return view('livewire.submission-list',[
            'submissions' => Submission::whereHas('inventory', function($q){
                $q->where('name','like','%'.$this->search.'%');
            })->with(['user', 'inventory'])->paginate($this->perPage)
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

                if ($usId == $user) {
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
}
