<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Submission;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $filterPageStatus = null;
    public $filterPageUser = null;
    public $filterPageJenis = null;
    public $search = '';
    
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'RequestUpdated' => 'render'
    ];

    public function render()
    {
        return view('livewire.inventory-list', [
            // 'users' => User::all(),
'inventories' => Inventory::where('name', 'like', '%' . $this->search . '%')
    ->whereNotNull('kode_barang')
    ->where('kode_barang', '!=', '')
    ->orderBy('updated_at', 'desc')
    ->paginate($this->perPage)

            // 'users' => User::all(),
            // 'submissions' => Submission::whereHas('inventory', function($q){
            //     $q->where('name','like','%'.$this->search.'%');
            //     if ($this->filterPageJenis) {
            //         $q->where('jenis', $this->filterPageJenis);
            //     }
            // })
            // ->with(['user', 'inventory'])
            // ->when($this->filterPageUser,function($query){
            //     $query->where('user_id', $this->filterPageUser);
            // })
            // ->when($this->filterPageStatus,function($query){
            //     $query->where('status', $this->filterPageStatus);
            // })
            // ->orderBy('updated_at', 'desc')
            // ->paginate($this->perPage)
        ]);
    }
}
