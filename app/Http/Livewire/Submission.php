<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Submission extends Component
{
    public $submissionUpdateStatus = false;

    protected $listeners = [
        'submissionUpdateStatus',
        'getSubmission' => 'data',
    ];

    public function render()
    {
        return view('livewire.submission');
    }

    public function submissionUpdateStatus(){
        $this->submissionUpdateStatus = true;
    }

    public function data($submission){
        $this->emit('dataSubmission', $submission);
    }
}
