<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmissionUpdate extends Component
{
    public $submissionInventoryId;
    public $name;
    public $jumlah;
    public $keterangan;
    public $user_id;
    public $jenis;
    public $status;

    protected $listeners = [
        'dataSubmission' => 'showSubmission'
    ];

    public function render()
    {
        return view('livewire.submission-update');
    }


    public function showSubmission($submission){
        $this->submissionInventoryId = $submission['inventory_id'];

        $data = Inventory::where('id', $this->submissionInventoryId)->first();
        $this->name = $data['name'];
        $this->jumlah = $data['jumlah'];
        $this->keterangan = $data['keterangan'];
        $this->jenis = $data['jenis'];
    }

    public function update(){

        $this->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'jenis' => 'required|integer',
            'keterangan' => 'nullable|max:255'
        ]);      

        if($this->submissionInventoryId){
            // $inventory = Inventory::find($this->submissionInventoryId);
            $inventory = Inventory::where('id', $this->submissionInventoryId)->first();
            $submission = Submission::where('inventory_id', $this->submissionInventoryId)->first();
            $uId = Auth::id();

            if($uId == $submission->user_id){
                $inventory->update([
                    'name' => $this->name,
                    'jumlah' => $this->jumlah,
                    'keterangan' => $this->keterangan,
                    'jenis' => $this->jenis
                ]);
                $this->name = NULL;
                $this->jumlah = NULL;
                $this->jenis = NULL;
                $this->keterangan = NULL;

                $this->dispatchBrowserEvent('success', ['message'=>'Pengajuan berhasil diubah !']);
            }else{
                $this->dispatchBrowserEvent('warning', ['message'=>'Tindakan ini tidak dapat dilanjutkan !']);
            }
        }
        $this->emit('submissionUpdateStatusFalse');
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
