<div class="col-xl-8">
    <div class="card mb-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Posisi List</h5>

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
                        
                        <small>{{ $positions->links() }}</small>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($positions as $index => $position)                        
                        <tr>
                            <td>{{ $positions->firstItem() + $index }}</td>
                            <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">{{ $position->name }}</span>
                            </td>
                            <td>
                                <div class="mt-0">
                                    <button  wire:click="getPosition({{ $position->id }})"  class="btn btn-sm btn-icon btn-warning me-2">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button type="reset" class="btn btn-sm btn-icon btn-danger">
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
</div>