<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Request extends Component
{
    protected $listeners = [
        'getRequest' => 'data',
        'getRequestP' => 'dataP'
    ];

    public function render()
    {
        return view('livewire.request');
    }

    public function data($submission){
        $this->emit('dataRequest', $submission);
    }

    public function dataP($submission){
        $this->emit('dataRequestP', $submission);
    }
}
