<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmissionUpdate extends Component
{
    public $submissionId;
    public $name;
    public $jumlah;
    public $keterangan;
    public $user_id;
    public $jenis;
    public $status;
    // public $userId;

    protected $listeners = [
        'dataSubmission' => 'showSubmission'
    ];

    public function render()
    {
        return view('livewire.submission-update');
    }

    public function showSubmission($submission){
        $this->submissionId = $submission['id'];
        $this->name = $submission['name'];
        $this->jumlah = $submission['jumlah'];
        $this->keterangan = $submission['keterangan'];
        $this->user_id = $submission['user_id'];
        $this->jenis = $submission['jenis'];
        $this->status = $submission['status'];
    }

    public function update(){

        $this->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'jenis' => 'required|integer',
            'keterangan' => 'nullable|max:255'
            // 'user_id' => 'nullable|integer'
            // 'status' => 'nullable|integer'
        ]);

        if($this->submissionId){
            $submission = Submission::find($this->submissionId);
            $userId = Auth::id();
            if($submission->status == 0 && $submission->user_id == $userId){
                $submission->update([
                    'name' => $this->name,
                    'jumlah' => $this->jumlah,
                    'keterangan' => $this->keterangan,
                    'jenis' => $this->jenis
                    // 'user_id' => ($this->auth()->id),
                    // 'user_id' => Auth::id(),
                    // 'status' => 0
                ]);
            }else{
                dd("no");
            }

            $this->name = NULL;
            $this->jumlah = NULL;
            $this->jenis = NULL;
            $this->keterangan = NULL;
            // $this->user_id = NULL;
            // $this->status = NULL;

            // session()->flash('success', 'Pengajuan berhasil diedit');
            $this->emit('submissionUpdateStatusFalse');
            $this->dispatchBrowserEvent('success', ['message'=>'Pengajuan berhasil diubah !']);

        }
        $this->emit('SubmissionUpdated');
    }

    public function cancel(){
        $this->name = NULL;
        $this->jumlah = NULL;
        $this->jenis = NULL;
        $this->keterangan = NULL;

        $this->emit('submissionUpdateStatusFalse');
    }
}
