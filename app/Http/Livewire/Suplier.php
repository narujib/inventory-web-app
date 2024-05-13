<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Suplier extends Component
{
    public $suplierUpdateStatus = false;
    protected $listeners = [
        'suplierUpdateStatus',
        'getSuplier' => 'data',
    ];

    public function render()
    {
        return view('livewire.suplier');
    }

    public function suplierUpdateStatus(){
        $this->suplierUpdateStatus = true;
    }   
    public function data($suplier){
        $this->emit('dataSuplier', $suplier);
    } 
}
