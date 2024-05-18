<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Tambah data suplier</h5>

        <div class="card-body">
            <form wire:submit.prevent="store">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama</label>
                    <input wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Email</label>
                    <input wire:model.defer="email" type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Telepon</label>
                    <input wire:model.defer="telepon" type="number" id="telepon" name="telepon" class="form-control phone-mask  @error('telepon') is-invalid @enderror" placeholder="Telepon">

                    @error('telepon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                <label class="form-label" for="basic-default-message">Alamat</label>
                <textarea wire:model.defer="alamat" id="alamat" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" placeholder="Alamat"></textarea>
                @error('alamat')
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