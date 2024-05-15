<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Request extends Component
{
    protected $listeners = [
        'getRequest' => 'data'
    ];

    public function render()
    {
        return view('livewire.request');
    }

    public function data($submission){
        $this->emit('dataRequest', $submission);
    }
}
