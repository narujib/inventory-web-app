<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use Livewire\Component;
use Livewire\WithPagination;

class SubmissionList extends Component
{
    public $submissionId;
    public $submissionUpdateStatus = false;
    public $perPage = 5;
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
            // $query = $request->input('query'),
            // 'inventories' => Inventory::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->paginate($this->perPage),
            // 'submissions' => Inventory::orderBy('id','desc')->where('name','like','%'.$this->search.'%')->with('submission')->paginate($this->perPage),
            'submissions' => Submission::whereHas('inventory', function($q){
                $q->where('name','like','%'.$this->search.'%');
            })->with(['user', 'inventory'])->paginate($this->perPage)
        ]);
    }

    public function getSubmission($inventory_id){
        $this->emit('submissionUpdateStatus');
        $submission = Submission::where('inventory_id', $inventory_id)->first();
        $this->emit('getSubmission', $submission);
    }

    public function deleteConfirm($inventory_id){
        $this->submissionId = $inventory_id;
    }

    public function destroy(){

        $i = Inventory::where('id', $this->submissionId)->first();
        $x = Submission::where('inventory_id', $this->submissionId)->first();

        $x->delete();
        $i->delete();

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
