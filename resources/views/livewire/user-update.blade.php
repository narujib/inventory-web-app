<div class="col-xl">
    <div class="card mb-3">
        <h5 class="card-header">Ubah Pengguna</h5>

        <div class="card-body">
            <form wire:submit.prevent="update">
                @csrf
                <input type="hidden" name="" wire:model.defer="userId">
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
                {{-- <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input wire:model.defer="password" type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="password"  placeholder="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                    {{-- <div class="col-sm-6">
                        <div class="mb-1">
                            <label class="form-label" for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" placeholder="Confirm password">
                        </div>
                    </div> --}}

                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Jabatan</label>

                    <select wire:model.defer="position_id" name="position_id" id="position_id" class="form-select @error('position_id') is-invalid @enderror">
                        <option>--Pilih jabatan--</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>

                    @error('position_id')
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