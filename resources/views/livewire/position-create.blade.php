<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Tambahkan jabatan</h5>

        <div class="card-body">
            <form wire:submit.prevent="store">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama</label>
                    <input wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">
                    <div class="form-check mt-3">
                        <input class="form-check-input" wire:model.defer="role_as" type="checkbox">
                        <label class="form-check-label" for="defaultCheck1"> Administrator </label>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="float-end btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>