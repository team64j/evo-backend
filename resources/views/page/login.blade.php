@extends('auth')

@section('content')
    <form method="post" class="p-3">
        @csrf

        <div class="d-flex justify-content-center align-items-center mb-4">
            <div class="logo"></div>
            <strong class="ms-2 display-6 fs-2 lh-1 text-uppercase">{{ config('version.branch') }}</strong>
        </div>

        <div class="form-group mb-4">
            <label for="username" class="text-muted">
                @lang('global.username')
            </label>
            <input type="text" name="username" id="username" value="{{ old('username') }}"
                   class="form-control form-control-lg bg-black bg-opacity-25"
                   autofocus>
            @error('username')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="password" class="text-muted">
                @lang('global.password')
            </label>
            <input type="password" name="password" id="password" value="{{ old('password') }}"
                   class="form-control form-control-lg bg-black bg-opacity-25">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check pe-4">
                <input class="form-check-input bg-opacity-50" type="checkbox" name="remember" id="remember"
                       style="--bs-form-check-bg: rgba(var(--bs-body-bg-rgb),var(--bs-bg-opacity))"
                        @checked(old('remember'))>
                <label class="form-check-label text-muted" for="remember">
                    @lang('global.remember_username')
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-success px-4">
                <strong>@lang('global.login_button')</strong>
            </button>
        </div>

    </form>
@endsection
