<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use App\Models\Suplier;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Livewire\Component;

class IncomingCreate extends Component
{
    public $name;
    public $kode_barang;
    public $suplier_id;
    public $lokasi;
    public $jumlah;
    public $keterangan;
    public $jenis;

    protected $rules = [
        'name' => 'required|string|max:255',
        'kode_barang' => 'nullable|string|max:255|unique:inventories,kode_barang',
        'suplier_id' => 'required|integer',
        'lokasi' => 'required|string|max:255',
        'jumlah' => 'required|integer|max:9999|min:1',
        'keterangan' => 'nullable|string|max:255',
        'jenis' => 'required|integer|max:99',
    ];

    public function render()
    {
        return view('livewire.incoming-create',[
            'supliers' => Suplier::all()
        ]);
    }

    public function store()
    {        
        $this->validate();
        $uID = IdGenerator::generate(['table' => 'inventories', 'field' => 'kode_barang', 'length' => 5, 'prefix' => 'BR']);

        $inventory = new Inventory();
        $inventory->name = $this->name;
        $inventory->kode_barang = $uID;
        $inventory->suplier_id = $this->suplier_id;
        $inventory->lokasi = $this->lokasi;
        $inventory->jumlah = $this->jumlah;
        $inventory->keterangan = $this->keterangan;
        $inventory->jenis = $this->jenis;
        
        $inventory->save();

        $this->name = NULL;
        $this->kode_barang = NULL;
        $this->suplier_id = NULL;
        $this->lokasi = NULL;
        $this->jumlah = NULL;
        $this->keterangan = NULL;
        $this->jenis = NULL;

        $this->dispatchBrowserEvent('success', ['message'=>'Barang masuk berhasil ditambahkan !']);

        $this->emit('SubmissionStore');
    }
}
