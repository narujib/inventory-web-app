<div class="col-xl" id="submission">
    <div class="card mb-3">
        <h5 class="card-header">Ubah pengajuan
        </h5>

        <div class="card-body">
            <form wire:submit.prevent="update">
                @csrf
                <input type="hidden" name="" wire:model.defer="submissionId">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Nama</label>
                        <input wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jumlah</label>
                        <input wire:model.defer="jumlah" type="number" min="1" class="form-control  @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Jumlah">

                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jenis</label>

                        <select id="jenis" wire:model.defer="jenis" name="jenis" class="form-select @error('jenis') is-invalid @enderror">
                            <option>---Pilih jenis---</option>
                            <option value="1">Sarana</option>
                            <option value="2">Prasarana</option>
                            <option value="3">Lainnya</option>
                        </select>

                        @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Keterangan</label>
                        <textarea wire:model.defer="keterangan" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan"></textarea>

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-0">

                    <button wire:loading wire:loading.attr="disabled" type="submit" class="float-end btn btn-primary">
                        <span class="spinner-border spinner-border-sm text-white mx-3" role="status"></span>
                    </button>
                    <button wire:loading.remove class="float-end btn btn-primary">
                        <span>Ubah</span>
                    </button>

                    <button wire:loading wire:loading.attr="disabled" class="me-2 float-end btn btn-secondary">
                        <span class="spinner-border spinner-border-sm text-white mx-3" role="status"></span>
                    </button>
                    <div  wire:loading.remove>
                        <button type="reset" wire:click="cancel()" class="me-2 float-end btn btn-secondary">
                            <span>Batal</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>