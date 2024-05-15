<div class="col-xl-8">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Pengguna</h5>

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
        
        <div class="input-group input-group-merge px-4 mb-3">
            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" wire:model="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <caption class="ms-4">
                    <div class="d-flex align-items-center justify-content-center">
                        
                        <small>{{ $users->links() }}</small>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $index => $user)                        
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">{{ $user->name }}</span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ( $user->position_id == '1' )
                                    <span class="badge bg-primary">{{ $user->position->name }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $user->position->name }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="mt-0">
                                    <button wire:click="getUser({{ $user->id }})" class="btn btn-sm btn-icon btn-warning me-2">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button wire:click="deleteConfirm({{ $user->id }})" type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                        <i class='bx bx-trash' ></i>
                                    </button>
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
                <button type="button" data-bs-dismiss="modal" wire:click="destroy()" class="btn btn-primary">Hapus</button>
            </div>
            </div>
        </div>
    </div>

</div>