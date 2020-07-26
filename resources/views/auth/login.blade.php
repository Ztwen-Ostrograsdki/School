@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->has('info'))
            <h5 class="alert alert-{{session('type')}} w-100 mx-auto text-center">{{session('info')}}</h5>
        @endif
            <div class="card box-color-login mt-5 border border-white">
                <div class="card-header border-bottom border-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" placeholder="Veuillez renseigner votre adresse..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Veuillez renseigner votre mot de passe..." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class=" mb-0 w-100 mx-auto">
                            <div class="w-100">
                                <div class="w-50 d-flex justify-content-between mx-auto">
                                    <button type="submit" class="btn btn-primary w-50 mr-1">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="#" class=" d-inline-block btn btn-secondary w-50 ml-1">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="w-75 mx-auto text-center">
                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
    <script src="{{ asset('vendor/chart.js/Chart.js') }}" defer></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}" defer></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}" defer></script>
@endsection     
