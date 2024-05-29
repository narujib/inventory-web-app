<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use App\Models\Suplier;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Livewire\Component;

class SucsessStatus extends Component
{
    public $requestId;
    // public $status;

    public $name;
    public $kode_barang;
    public $suplier_id;
    public $lokasi;
    public $jumlah;
    public $keterangan;
    public $jenis;

    public $status;
    public $kode_permintaan;
    public $inventory_id;
    public $user_id;

    protected $listeners = [
        'dataRequestS' => 'showRequest'
    ];

    public function render()
    {
        return view('livewire.sucsess-status',[
            'supliers' => Suplier::all()
        ]);
    }

    protected $rules = [
        'status' => 'required',

        'name' => 'required|string|max:255',
        'kode_barang' => 'nullable|string|max:255|unique:inventories,kode_barang',
        'suplier_id' => 'required|integer',
        'lokasi' => 'required|string|max:255',
        'jumlah' => 'required|integer|max:9999',
        'keterangan' => 'nullable|string|max:255',
        'jenis' => 'required|integer|max:99',
    ];

    public function showRequest($submission)
    {
        $this->requestId = $submission['inventory_id'];

        $subData = Submission::where('inventory_id', $this->requestId)->first();
        $this->status = $subData['status'];
        $this->kode_permintaan = $subData['kode_permintaan'];

        $invData = Inventory::where('id', $this->requestId)->first();
        $this->name = $invData['name'];
        $this->jumlah = $invData['jumlah'];
        $this->keterangan = $invData['keterangan'];
        $this->jenis = $invData['jenis'];

    }

    public function update()
    {
        $this->validate();

        $uID = IdGenerator::generate(['table' => 'inventories', 'field' => 'kode_barang', 'length' => 5, 'prefix' => 'BR']);
        $submission = Submission::where('inventory_id', $this->requestId)->first();
        $inventory = Inventory::where('id', $this->requestId)->first();
        
        if($submission->status == 1 || $submission->status == 2){
            if($this->requestId){
                if($inventory){
                    $inventory->name = $this->name;
                    $inventory->kode_barang = $uID;
                    $inventory->suplier_id = $this->suplier_id;
                    $inventory->lokasi = $this->lokasi;
                    $inventory->jumlah = $this->jumlah;
                    $inventory->keterangan = $this->keterangan;
                    $inventory->jenis = $this->jenis;
                    $inventory->save();

                    if($submission){
                        $submission->status = 3;
                        $submission->save();
                    }
                }
                $this->dispatchBrowserEvent('success', ['message'=>'Berhasil ditambahkan ke inventory !']);
                $this->dispatchBrowserEvent('close-modal');
                $this->emit('RequestUpdated');
            }
        }else{
            $this->dispatchBrowserEvent('warning', ['message'=>'Terjadi kesalahan !']);
            $this->dispatchBrowserEvent('close-modal');
        }

        $this->name = NULL;
        $this->kode_barang = NULL;
        $this->suplier_id = NULL;
        $this->lokasi = NULL;
        $this->jumlah = NULL;
        $this->keterangan = NULL;
        $this->jenis = NULL;
    }

    public function cancel()
    {
        $this->requestId = NULL;
        $this->name = NULL;
        $this->kode_barang = NULL;
        $this->suplier_id = NULL;
        $this->lokasi = NULL;
        $this->jumlah = NULL;
        $this->keterangan = NULL;
        $this->jenis = NULL;
    }
}
