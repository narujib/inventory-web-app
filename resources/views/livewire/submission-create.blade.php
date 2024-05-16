<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Ajukan</h5>

        <div class="card-body">
            <form wire:submit.prevent="store">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Nama</label>
                        <input wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">
                        {{-- <input wire:model.defer="inventory_id" type="text" class="form-control  @error('name') is-invalid @enderror" id="inventory_id" name="inventory_id" placeholder="inventory_id"> --}}

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jumlah</label>
                        <input wire:model.defer="jumlah" type="number" class="form-control  @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Jumlah">

                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">User_id</label>
                        <input wire:model.defer="user_id" type="text" class="form-control  @error('user_id') is-invalid @enderror" id="user_id" name="user_id" placeholder="{{ $user_id }}" readonly>

                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jenis</label>

                        <select id="jenis" wire:model.defer="jenis" name="jenis" class="form-select @error('jenis') is-invalid @enderror">
                            <option>---Pilih jenis---</option>
                            <option value="1">Sarana</option>
                            <option value="2">Prasarana</option>
                            <option value="3">Lainnya</option>
                        </select>
                        {{-- <input  type="text" class="form-control  @error('jenis') is-invalid @enderror" id="jenis" name="jenis" placeholder="Jenis"> --}}

                        @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Keterangan</label>
                        <textarea wire:model.defer="keterangan" id="keterangan" name="keterangan" class="form-control     @error('keterangan') is-invalid @enderror" placeholder="Keterangan"></textarea>

                        {{-- <input wire:model.defer="keterangan" type="text" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan"> --}}

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="float-end btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>