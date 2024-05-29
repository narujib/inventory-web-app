@push('scripts')
    <script src="{{ asset('scripts/script.js') }}"></script>
@endpush

<div class="col-xl-8">
    <div class="card mb-3">

        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Suplier</h5>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-file-pdf"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-print"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="mx-4 mb-3 d-flex align-items-center justify-content-between">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <select wire:model.live="perPage" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="input-group input-group-merge px-4 mb-3">
            <span class="input-group-text"><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" wire:model="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <caption class="ms-4">
                    <div class="d-flex align-items-center justify-content-center">
                        
                        <small>{{ $supliers->links() }}</small>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($supliers as $index => $suplier)                        
                        <tr>
                            <td>{{ $supliers->firstItem() + $index }}</td>
                            <td>
                                <span class="fw-medium">{{ $suplier->name }}</span>
                            </td>
                            <td>{{ $suplier->telepon }}</td>
                            <td>{{ $suplier->alamat }}</td>
                            <td>
                                <div class="mt-0">
                                    <button  wire:click="getSuplier({{ $suplier->id }})"  class="scroll-suplier btn btn-sm btn-icon btn-warning me-2">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button wire:click="deleteConfirm({{ $suplier->id }})" type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                        <i class='bx bx-trash' ></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h4 class="text-muted my-3">
                                Tidak ada data ditemukan !
                                </h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal -->
    <div  wire:ignore.self class="modal fade " id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center mt-4 align-items-center ">
                    <div class="text-center">
                        <i class="fa-solid fa-5x fa-triangle-exclamation mb-2"></i>
                        <h5 class="text-muted">Apakah anda yakin !</h5>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between align-items-center">
                    <button wire:loading wire:loading.attr="disabled" class="btn btn-outline-secondary float-end" data-bs-dismiss="modal">
                        <span class="spinner-border spinner-border-sm text-secondary mx-3" role="status"></span>
                    </button>
                    <div wire:loading.remove>
                        <button type="reset" wire:click="cancel()" class="btn btn-outline-secondary float-end" data-bs-dismiss="modal">Batal</button>
                    </div>


                    <button wire:loading wire:loading.attr="disabled" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm text-white mx-3" role="status"></span>
                    </button> 
                    <div wire:loading.remove>
                        <button type="button" data-bs-dismiss="modal" wire:click="destroy()" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>