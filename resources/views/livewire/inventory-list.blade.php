@push('scripts')
    <script src="{{ asset('scripts/script.js') }}"></script>
@endpush

<div class="col-xl">

    @livewire('widget-request')

    <div class="card mb-3">

        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Permintaan</h5>
        </div>
        <div class="mx-4 d-flex align-items-center justify-content-between">
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

        <div class="card-header d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            {{-- <div class="col-md-4">
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
            </div> --}}
            {{-- <div class="col-md-4">
                <select wire:model.live="filterPageUser" class="form-select text-capitalize">
                    <option value="">--All User--</option>
                    @foreach ($users as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="col-md-4">
                <select wire:model.live="filterPageJenis" class="form-select text-capitalize">
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
            <span class="input-group-text"><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" wire:model="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <caption class="ms-4">
                    <div class="d-flex align-items-center justify-content-center">
                        
                        <small>{{ $inventories->links() }}</small>
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
                    @forelse ($inventories as $index => $data)                        
                        <tr>
                            <td>{{ $inventories->firstItem() + $index }}</td>
                            <td>
                                <i>{{ $data->kode_barang }} -</i>
                                <span class="fw-medium">{{ $data->name }}</span>
                            </td>
                            <td>
                                <span class="fw-medium">{{ $data->jumlah }}</span>
                            </td>
                            <td>
                                @if ( $data->jenis == '1' )
                                    <span class="badge rounded-pill bg-label-primary">Sarana</span>
                                @elseif( $data->jenis == '2' )
                                    <span class="badge rounded-pill bg-label-success">Prasarana</span>
                                @elseif ($data->jenis == '3')
                                    <span class="badge rounded-pill bg-label-info">Lainnya</span>
                                @else
                                    <span class="badge rounded-pill bg-label-secondary">nothing</span>
                                @endif
                            </td>
                            <td>
                                {{-- <span class="fw-medium">{{ $submission->user->name }}</span> --}}
                            </td>
                            <td>
                                <span class="fw-medium">{{ $data->keterangan }}</span>
                            </td>
                            <td>                                
                                {{-- @if ( $submission->status == '1' )
                                    <span class="badge bg-warning">pending</span>
                                @elseif ( $submission->status == '2' ) 
                                    <span class="badge bg-info">diproses</span>
                                @elseif ( $submission->status == '3' ) 
                                    <span class="badge bg-success">selesai</span>
                                @else
                                    <span class="badge bg-secondary">nothing</span>
                                @endif --}}
                            </td>
                            <td>
                                <div class="mt-0">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu px-2 mx-auto">
                                            {{-- <div class="mx-auto mt-0">
                                                <button class="btn mt-2 btn-sm btn-outline-secondary w-100"  data-bs-toggle="modal" data-bs-target="#backDropModalP" wire:click="getSubmissionP({{ $submission->id }})">Pending</button>
                                            </div>
                                            <div class="mx-auto">
                                                <button class="btn mt-2 btn-sm btn-outline-secondary w-100"  data-bs-toggle="modal" data-bs-target="#backDropModal" wire:click="getSubmission({{ $submission->id }})">Proses</button>
                                            </div>

                                            <div class="mx-auto">
                                                <button class="btn mt-2 btn-sm btn-outline-secondary w-100"  data-bs-toggle="modal" data-bs-target="#backDropModalS" wire:click="getSubmissionS({{ $submission->id }})">Selesai</button>
                                            </div> --}}
                                        </div>
                                    </div>
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

    @livewire('acc-status')
    @livewire('pending-status')
    @livewire('sucsess-status')

</div>