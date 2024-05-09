<div class="col-xxl">
    <div class="card mb-4">
        <h5 class="card-header">Add User</h5>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible mx-4" role="alert">
                User successfully created!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body">
            <form wire:submit.prevent="store">
                @csrf
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <div class="mb-1">
                            <label class="form-label" for="name">Name</label>
                            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name"  autocomplete="name" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-1">
                            <label class="form-label" for="email">Email</label>
                            <input wire:model="email" type="email" name="email" value="{{ old('email') }}"  autocomplete="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="mb-1">
                            <label class="form-label" for="password">Password</label>
                            <input wire:model="password" type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="password"  placeholder="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="mb-1">
                            <label class="form-label" for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" placeholder="Confirm password">
                        </div>
                    </div> --}}
                </div>
                <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-end">Add new user</button>
                </div>
                </div>
            </form>
        </div>
    </>
</div>