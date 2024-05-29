<div class="col-xl">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Pengajuan Saya</h5>
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
                <div class="d-flex align-items-center ms-2">
                    <select class="form-select" wire:model.live="filterPageStatus" aria-label="Default select example">
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
            </div>
        </div>
        
        <div class="input-group input-group-merge px-4 mb-3">
            <span class="input-group-text" ><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" wire:model="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Jenis</th>
                        {{-- <th>User</th> --}}
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
                            <td class=" text-end">
                                <span class="fw-medium">{{ $submission->inventory->jumlah }} pcs</span>
                            </td>
                            <td class="text-center">
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
                            {{-- <td>
                                @if ( $submission->user->name != null)
                                    <span class="fw-medium">{{ $submission->user->name }}</span>
                                @else
                                    <span class="fw-medium">unknown</span>
                                @endif
                            </td> --}}
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
                                <div class="mt-0 text-center">
                                    <i class="fa-regular fa-eye"></i>
                                    {{-- @if ($submission->user_id == Auth::user()->id && $submission->status == 1)                                        
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
                                    @endif --}}
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
        <caption>
            <div class="d-flex align-items-center justify-content-center mt-3">
                <small class="pagination-sm">{{ $submissions->links() }}</small>
            </div>
        </caption>
    </div>
</div>