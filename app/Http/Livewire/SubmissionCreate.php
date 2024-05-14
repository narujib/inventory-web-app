<?php

namespace App\Http\Livewire;

use App\Models\Submission;
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

    public function render()
    {
        return view('livewire.submission-create');
    }

    public function store(){
        $this->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|max:255',
            'user_id' => 'nullable|integer',
            'jenis' => 'required|integer',
            'status' => 'nullable|integer'
        ]);

        Submission::Create([
            'name' => $this->name,
            'jumlah' => $this->jumlah,
            'keterangan' => $this->keterangan,
            // 'user_id' => ($this->auth()->id),
            'user_id' => Auth::id(),
            'jenis' => $this->jenis,
            'status' => 0
        ]);

        $this->name = NULL;
        $this->jumlah = NULL;
        $this->keterangan = NULL;
        $this->user_id = NULL;
        $this->jenis = NULL;
        $this->status = NULL;

        session()->flash('success', 'Berhasil mengajukan barang !');

        $this->emit('SubmissionStore');
    }
}