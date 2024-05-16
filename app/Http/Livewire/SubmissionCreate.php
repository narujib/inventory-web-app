<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmissionCreate extends Component
{
    public $name;
    public $jumlah;
    public $keterangan;
    public $user_id;
    public $jenis;
    public $status;

    protected $rules = [
        'name' => 'required|string|max:255',
        'jumlah' => 'required|integer',
        'keterangan' => 'nullable|max:255',
        'jenis' => 'required|integer',

        'user_id' => 'nullable|integer',
    ];

    public function render()
    {
        return view('livewire.submission-create');
    }

    public function store(){
        $this->validate();

        $inventory = new Inventory();
        $inventory->name = $this->name;
        $inventory->jumlah = $this->jumlah;
        $inventory->keterangan = $this->keterangan;
        $inventory->jenis = $this->jenis;
        
        $inventory->save();
        
        $submission = new Submission();
        $submission->status = 1;
        $submission->inventory_id = $inventory->id;
        $submission->user_id = auth()->user()->id;

        $submission->save();

        $this->name = NULL;
        $this->jumlah = NULL;
        $this->keterangan = NULL;
        $this->user_id = NULL;
        $this->jenis = NULL;
        $this->status = NULL;

        // session()->flash('success', 'Berhasil mengajukan barang !');
        $this->dispatchBrowserEvent('success', ['message'=>'Pengajuan berhasil ditambahkan !']);

        $this->emit('SubmissionStore');
    }
}