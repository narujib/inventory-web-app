<div>
<!-- Modal -->
    <div  wire:ignore.self class="modal fade " id="backDropModalS" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Tambahkan barang ke inventory {{ $kode_permintaan }}</h5>
                </div>
                <form wire:submit.prevent="update">
                    @csrf
                    <div class="modal-body d-flex justify-content-center mt-0 align-items-center ">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input disabled wire:model.defer="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama">
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
                                <label class="form-label" for="basic-default-fullname">Suplier</label>

                                <select id="suplier_id" wire:model.defer="suplier_id" name="suplier_id" class="form-select @error('suplier_id') is-invalid @enderror">
                                    <option>---Pilih suplier---</option>
                                    @foreach ($supliers as $suplier)
                                        <option value="{{ $suplier->id }}">{{ $suplier->name }}</option>
                                    @endforeach
                                </select>

                                @error('suplier_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-default-fullname">Lokasi</label>
                                <input type="text" wire:model.defer="lokasi" id="lokasi" name="lokasi" class="form-control     @error('lokasi') is-invalid @enderror" placeholder="Lokasi"></input>

                                @error('lokasi')
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
                    </div>
                    <div class="modal-footer">
                        <button type="reset" wire:click="cancel()" class="btn btn-outline-secondary float-end" data-bs-dismiss="modal">
                        Batal
                        </button>
                        <button type="submit"  class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>