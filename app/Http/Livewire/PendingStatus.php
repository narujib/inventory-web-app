<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use Livewire\Component;

class PendingStatus extends Component
{
    public $requestId;
    public $status;

    protected $listeners = [
        'dataRequest' => 'showRequest',
    ];

    public function render()
    {
        return view('livewire.pending-status');
    }

    public function showRequest($submission){
        $this->requestId = $submission['id'];
        $this->status = $submission['status'];
    }

    public function update(){
        $this->validate([
            'status' => 'required'
        ]);

        if($this->requestId){
            $submission = Submission::find($this->requestId);
            $submission->update([
                'status' => 1
        ]);

        $this->dispatchBrowserEvent('success', ['message'=>'Status berhasil diupdate !']);
        }
        $this->emit('RequestUpdated');
    }

    public function cancel(){
        $this->requestId = NULL;
    }
}
