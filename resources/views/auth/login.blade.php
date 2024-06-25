@extends('auth.auth')

@section('content')
    <form method="post">
        @csrf

        <div class="form-group mb-4">
            <label for="username" class="text-muted">
                @lang('global.username')
            </label>
            <input type="text" name="username" id="username" value="{{ old('username') }}"
                   class="form-control form-control-lg"
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
                   class="form-control form-control-lg">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-muted" for="remember">
                    @lang('global.remember_username')
                </label>
            </div>
            <button class="btn btn-lg btn-success px-4"><strong>@lang('global.login_button')</strong></button>
        </div>

    </form>
@endsection
