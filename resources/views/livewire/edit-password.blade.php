<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
  @include('layouts.components.nav-user')

  <div class="card mb-4">
    <h5 class="card-header">Ubah password</h5>
    <div class="card-body">
      <form wire:submit.prevent="update">
        @csrf
        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label">Password lama</label>
            <input wire:model.defer="current_password" class="form-control @error('current_password') is-invalid @enderror" type="password" placeholder="password lama">

            @error('current_password')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label">Password baru</label>
            <input wire:model.defer="new_password" class="form-control @error('new_password') is-invalid @enderror" type="password" placeholder="password baru">
            
            @error('new_password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Konfirmasi password</label>
            <input wire:model.defer="confirm_new_password" class="form-control @error('confirm_new_password') is-invalid @enderror" type="password" placeholder="password lama">
    
            @error('confirm_new_password')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Save changes</button>
          {{-- <button type="reset" class="btn btn-outline-secondary">Cancel</button> --}}
        </div>
      </form>
    </div>
  </div>

</div>