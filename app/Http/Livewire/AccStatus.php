<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use Livewire\Component;

class AccStatus extends Component
{
    public $requestId;
    public $status;

    protected $listeners = [
        'dataRequest' => 'showRequest',
    ];

    public function render()
    {
        return view('livewire.acc-status');
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
                'status' => 2
        ]);

        $this->dispatchBrowserEvent('success', ['message'=>'Status berhasil diupdate !']);
        }
        $this->emit('RequestUpdated');
    }

    public function cancel(){
        $this->requestId = NULL;
    }
}
