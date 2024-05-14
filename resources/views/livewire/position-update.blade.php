<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Ubah jabatan</h5>        

        <div class="card-body">
            <form wire:submit.prevent="update">
                @csrf
                <input type="hidden" name="" wire:model.defer="positionId">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama</label>
                    <input wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-0">
                    <button type="submit" class="float-end btn btn-primary">Ubah</button>
                    <button type="reset" wire:click="cancel()" class="me-2 float-end btn btn-secondary">Batal</button>
                </div>
                </form>
        </div>
    </div>
</div>