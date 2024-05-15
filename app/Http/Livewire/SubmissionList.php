<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use Livewire\Component;
use Livewire\WithPagination;

class SubmissionList extends Component
{
    public $submissionId;
    public $submissionUpdateStatus = false;
    public $perPage = 10;
    protected $listeners = [
        'SubmissionUpdated' => 'render',
        'SubmissionStore' => 'render'
    ];
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.submission-list',[
            'submissions' => Submission::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function getSubmission($id){
        $this->emit('submissionUpdateStatus');
        $submission = Submission::find($id);
        $this->emit('getSubmission', $submission);
    }

    public function deleteConfirm($id){
        $this->submissionId = $id;
    }

    public function destroy(){
        $submission = Submission::where('id', $this->submissionId)->first();
        $submission->delete();
        $this->submissionId = NULL;

        $this->dispatchBrowserEvent('success', ['message'=>'Pengajuan berhasil dihapus !']);

        $this->emit('SubmissionStore');
    }

    public function cancel(){
        $this->submissionId = NULL;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
