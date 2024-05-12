<div class="col-xl-8">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Suplier List</h5>

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
                        
                        <small>{{ $supliers->links() }}</small>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($supliers as $index => $suplier)                        
                        <tr>
                            <td>{{ $supliers->firstItem() + $index }}</td>
                            <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">{{ $suplier->name }}</span>
                            </td>
                            <td>{{ $suplier->telepon }}</td>
                            <td>
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>