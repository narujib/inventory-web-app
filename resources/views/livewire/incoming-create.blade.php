@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush

<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Barang Masuk</h5>
        <hr class="mt-0 mb-0">

        <div class="card-body">
            <form wire:submit.prevent="store">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Nama</label>
                        <input wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Nama">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jumlah</label>
                        <input wire:model.defer="jumlah" type="number" min="1" class="form-control  @error('jumlah') is-invalid @enderror" placeholder="Jumlah">

                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Jenis</label>

                        <select wire:model.defer="jenis" class="form-select @error('jenis') is-invalid @enderror">
                            <option>---Pilih jenis---</option>
                            <option value="1">Sarana</option>
                            <option value="2">Prasarana</option>
                            <option value="3">Lainnya</option>
                        </select>

                        @error('jenis')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Suplier</label>

                        <select wire:model.defer="suplier_id" class="form-select @error('suplier_id') is-invalid @enderror">
                            <option>---Pilih suplier---</option>
                            @foreach ($supliers as $suplier)
                                <option value="{{ $suplier->id }}">{{ $suplier->name }}</option>
                            @endforeach
                        </select>

                        @error('suplier_id')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Lokasi</label>
                        <input type="text" wire:model.defer="lokasi" class="form-control     @error('lokasi') is-invalid @enderror" placeholder="Lokasi"></input>

                        @error('lokasi')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Keterangan</label>
                        <textarea wire:model.defer="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan"></textarea>

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" wire:loading wire:loading.attr="disabled" class="float-end btn btn-primary">
                    <span class="spinner-border spinner-border-sm text-white mx-4" role="status"></span>
                </button>
                <button wire:loading.remove type="submit" class="float-end btn btn-primary">
                    <span>Tambahkan</span>
                </button>
            </form>
        </div>
    </div>
</div>