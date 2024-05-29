@push('scripts')
    <script src="{{ asset('scripts/script.js') }}"></script>
@endpush

<div class="col-xl">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Pengajuan</h5>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bx bx-printer bx-sm bx-border cursor-pointer me-3"></i>
                        <select wire:model.live="perPage" class="form-select">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                </div>
            </div>

        </div>
        <div class="card-header d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-md-4">
                <select class="form-select" wire:model.live="filterPageStatus" id="exampleFormControlSelect1" aria-label="Default select example">
                    <option selected value="">
                        --All Status--
                    </option>
                    <option value="1">
                        Pending
                    </option>
                    <option value="2">
                        Diproses
                    </option>
                    <option value="3">
                        Selesai
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <select id="UserRole"  wire:model.live="filterPageUser" class="form-select text-capitalize">
                    <option value="">--All User--</option>
                    @foreach ($users as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select id="UserRole"  wire:model.live="filterPageJenis" class="form-select text-capitalize">
                    <option selected value="">
                        --All Jenis--
                    </option>
                    <option value="1">
                        Sarana
                    </option>
                    <option value="2">
                        Prasarana
                    </option>
                    <option value="3">
                        Lainnya
                    </option>
                </select>
            </div>
        </div>
        
        <div class="input-group input-group-merge px-4 mb-3">
            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" wire:model="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <caption class="ms-4">
                    <div class="d-flex align-items-center justify-content-center">
                        
                        <small>{{ $submissions->links() }}</small>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Jenis</th>
                        <th>User</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($submissions as $index => $submission)
                        <tr>
                            <td>{{ $submissions->firstItem() + $index }}</td>
                            <td>
                                <i>{{ $submission->kode_permintaan }} -</i>
                                <span class="fw-medium">{{ $submission->inventory->name }}</span>
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->inventory->jumlah }}</span>
                            </td>
                            <td>
                                @if ( $submission->inventory->jenis == '1' )
                                    <span class="badge rounded-pill bg-label-primary">Sarana</span>
                                @elseif( $submission->inventory->jenis == '2' )
                                    <span class="badge rounded-pill bg-label-success">Prasarana</span>
                                @elseif ($submission->inventory->jenis == '3')
                                    <span class="badge rounded-pill bg-label-info">Lainnya</span>
                                @else
                                    <span class="badge rounded-pill bg-label-secondary">nothing</span>
                                @endif
                            </td>
                            <td>
                                @if ( $submission->user->name != null)
                                    <span class="fw-medium">{{ $submission->user->name }}</span>
                                @else
                                    <span class="fw-medium">unknown</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->inventory->keterangan }}</span>
                            </td>
                            <td>  
                                @if ( $submission->status == '1' )
                                    <span class="badge bg-warning">pending</span>
                                @elseif ( $submission->status == '2' ) 
                                    <span class="badge bg-info">diproses</span>
                                @elseif ( $submission->status == '3' ) 
                                    <span class="badge bg-success">selesai</span>
                                @else
                                    <span class="badge bg-secondary">nothing</span>                                          
                                @endif                              
                            </td>
                            <td>
                                <div class="mt-0">
                                    @if ($submission->user_id == Auth::user()->id && $submission->status == 1)                                        
                                        <button  wire:click="getSubmission({{ $submission->inventory_id }})"  class="scroll-submission btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button wire:click="deleteConfirm({{ $submission->inventory_id }})" type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    @else
                                        <button disabled  wire:click="getSubmission({{ $submission->inventory_id }})"  class="scroll-submission btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button disabled wire:click="deleteConfirm({{ $submission->inventory_id }})" type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
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