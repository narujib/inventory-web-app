<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Tambah position</h5>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible mx-4" role="alert">
                Posisi berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-body">
            <form wire:submit.prevent="store">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Nama</label>
                        <input wire:model="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jumlah</label>
                        <input wire:model="jumlah" type="number" class="form-control  @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Jumlah">

                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">User_id</label>
                        <input wire:model="user_id" type="text" class="form-control  @error('user_id') is-invalid @enderror" id="user_id" name="user_id" placeholder="{{ $user_id }}" readonly>

                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jenis</label>

                        <select id="jenis" wire:model="jenis" name="jenis" class="form-select @error('jenis') is-invalid @enderror">
                            <option>---Pilih jenis---</option>
                            <option value="0">Sarana</option>
                            <option value="1">Prasarana</option>
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
                        <textarea wire:model="keterangan" id="keterangan" name="keterangan" class="form-control     @error('keterangan') is-invalid @enderror" placeholder="Keterangan"></textarea>

                        {{-- <input wire:model="keterangan" type="text" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan"> --}}

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