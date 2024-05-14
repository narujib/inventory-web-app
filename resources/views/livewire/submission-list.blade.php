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
            <input type="text" class="form-control" wire:model.defer="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
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
                    @foreach ($submissions as $index => $submission)                        
                        <tr>
                            <td>{{ $submissions->firstItem() + $index }}</td>
                            <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">{{ $submission->name }}</span>
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->jumlah }}</span>
                            </td>
                            <td>
                                @if ( $submission->jenis == '1' )
                                    <span class="badge rounded-pill bg-label-primary">Prasarana</span>
                                @else
                                    <span class="badge rounded-pill bg-label-secondary">Sarana</span>                                
                                @endif
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->user->name }}</span>
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->keterangan }}</span>
                            </td>
                            <td>                                
                                @if ( $submission->status == '0' )
                                    <span class="badge bg-warning">menunggu</span>
                                @elseif ( $submission->status == '1' ) 
                                    <span class="badge bg-info">diterima</span>
                                @elseif ( $submission->status == '2' ) 
                                    <span class="badge bg-danger">ditolak</span>
                                @else
                                    <span class="badge bg-success">selesai</span>                                          
                                @endif
                            </td>
                            <td>
                                <div class="mt-0">
                                    @if ($submission->user->id == Auth::user()->id)                                        
                                        <button  wire:click="getSubmission({{ $submission->id }})"  class="btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button type="reset" class="btn btn-sm btn-icon btn-danger">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    @else
                                        <button disabled wire:click="getSubmission({{ $submission->id }})"  class="btn btn-sm btn-icon btn-warning me-2">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <button disabled type="reset" class="btn btn-sm btn-icon btn-danger">
                                            <i class='bx bx-trash' ></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>