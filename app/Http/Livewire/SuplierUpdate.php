<?php

namespace App\Http\Livewire;

use App\Models\Suplier;
use Livewire\Component;

class SuplierUpdate extends Component
{
    public $suplierId;
    public $name;
    public $email;
    public $alamat;
    public $telepon;

    protected $listeners = [
        'dataSuplier' => 'showSuplier'
    ];

    public function render()
    {
        return view('livewire.suplier-update');
    }

    public function showSuplier($suplier){
        $this->suplierId = $suplier['id'];
        $this->name = $suplier['name'];
        $this->email = $suplier['email'];
        $this->alamat = $suplier['alamat'];
        $this->telepon = $suplier['telepon'];
    }

    public function update(){
        $this->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255|unique:supliers,telepon,'.$this->suplierId,
            'email' => 'string|email|max:255|unique:supliers,email,'.$this->suplierId
        ]);

        if ($this->suplierId){
            $suplier = Suplier::find($this->suplierId);
            $suplier->update([
                'name' => $this->name,
                'alamat' => $this->alamat,
                'telepon' => $this->telepon,
                'email' => $this->email
            ]);

            $this->name = NULL;
            $this->email = NULL;
            $this->telepon = NULL;
            $this->alamat = NULL;

            $this->emit('suplierUpdateStatusFalse');
            $this->dispatchBrowserEvent('success', ['message'=>'Suplier berhasil diubah !']);

        }
        $this->emit('SuplierUpdated');
    }

    public function cancel(){
        $this->name = NULL;
        $this->email = NULL;
        $this->telepon = NULL;
        $this->alamat = NULL;
        
        $this->emit('suplierUpdateStatusFalse');
    }
}
