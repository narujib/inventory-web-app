<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use Livewire\Component;

class PendingStatus extends Component
{
    public $requestId;
    public $status;

    protected $listeners = [
        'dataRequestP' => 'showRequest',
    ];

    public function render()
    {
        return view('livewire.pending-status');
    }

    public function showRequest($submission){
        $this->requestId = $submission['id'];
        
        $data = Submission::where('id', $this->requestId)->first();
        $this->status = $data['status'];
    }

    public function update(){
        $this->validate([
            'status' => 'required'
        ]);

        if($this->requestId){
            // $submission = Submission::find($this->requestId);
            $submission = Submission::where('id', $this->requestId)->first();
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