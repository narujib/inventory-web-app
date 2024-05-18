<div class="col-xl">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Pengajuan</h5>

            <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-printer bx-sm bx-border cursor-pointer me-3"></i>
                            <select wire:model.live="perPage" id="defaultSelect" class="form-select">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                    </div>
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
                    {{-- @foreach ($submissions  as $x)
                        {{ $x->name }}
                    @endforeach --}}
                    @foreach ($submissions as $index => $submission)                        
                        <tr>
                            <td>{{ $submissions->firstItem() + $index }}</td>
                            <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
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
                                {{-- <span class="fw-medium">{{ $submission->user->name }}</span>                                 --}}
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
                                        <button  wire:click="getSubmission({{ $submission->inventory_id }})"  class="btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button wire:click="deleteConfirm({{ $submission->inventory_id }})" type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    {{-- @if ($submission->user_id == Auth::user()->id && $submission->inventory->status == 1)                                        
                                        <button  wire:click="getSubmission({{ $submission->id }})"  class="btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button wire:click="deleteConfirm({{ $submission->id }})" type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    @else
                                        <button disabled wire:click="getSubmission({{ $submission->id }})"  class="btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button disabled type="reset" class="btn btn-sm btn-icon btn-danger">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    @endif --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal -->
    <div  wire:ignore.self class="modal fade " id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-body d-flex justify-content-center mt-4 align-items-center ">
                <span class="text-danger">
                    <i class="float-center bx bx-info-circle bx-lg"></i>
                        <span class="h5 text-muted">Apakah anda yakin ?</span>
                </span>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <button type="reset" wire:click="cancel()" class="btn btn-outline-secondary float-end" data-bs-dismiss="modal">
                Batal
                </button>
                <button type="button" data-bs-dismiss="modal" wire:click="destroy()" wire:loading.attr="disabled" class="btn btn-primary">Hapus</button>
            </div>
            </div>
        </div>
    </div>

</div>