<div class="col-xl">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Permintaan</h5>

            {{-- <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bx bx-printer bx-sm bx-border cursor-pointer me-3"></i>
                    <select wire:model.live="perPage" id="defaultSelect" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div> --}}
        </div>     

        <div class="mx-4 mb-3 d-flex align-items-center justify-content-between">
            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center  me-3">
                    <select class="form-select" wire:model.live="filterPage" id="exampleFormControlSelect1" aria-label="Default select example">
                        {{-- <option selected="">--Filter--</option> --}}
                        <option selected value="">
                            --All status--
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
                <div class="d-flex align-items-center">
                    <select wire:model.live="perPage" id="defaultSelect" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>

            <i class="bx bx-printer bx-sm bx-border cursor-pointer"></i>
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
                                @elseif( $submission->jenis == '0' )
                                    <span class="badge rounded-pill bg-label-success">Sarana</span>
                                @elseif ($submission->jenis == '2')
                                    <span class="badge rounded-pill bg-label-info">Lainnya</span>
                                @else
                                    <span class="badge rounded-pill bg-label-secondary">nothing</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->user->name }}</span>
                            </td>
                            <td>
                                <span class="fw-medium">{{ $submission->keterangan }}</span>
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
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu px-2 mx-auto">
                                            <div class="mx-auto mt-0">
                                                <button class="btn mt-2 btn-sm btn-outline-secondary w-100"  data-bs-toggle="modal" data-bs-target="#backDropModalP" wire:click="getSubmissionP({{ $submission->id }})">Pending</button>
                                            </div>
                                            <div class="mx-auto">
                                                <button class="btn mt-2 btn-sm btn-outline-secondary w-100"  data-bs-toggle="modal" data-bs-target="#backDropModal" wire:click="getSubmission({{ $submission->id }})">Proses</button>
                                            </div>

                                            <div class="mx-auto">
                                                <button class="btn mt-2 btn-sm btn-outline-secondary w-100"  data-bs-toggle="modal" data-bs-target="#backDropModal">Selesai</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @livewire('acc-status')
    @livewire('pending-status')

</div>