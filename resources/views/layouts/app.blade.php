<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100 m-0 p-0">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
    <script src="{{ asset('vendor/chart.js/Chart.js') }}" defer></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}" defer></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}" defer></script>
    <script src="{{ asset('js/register.js') }}" defer></script>
    

  <!-- Custom styles for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/v4-shims.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custumise.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css-content')
</head>
<body class="m-0 p-0 h-100" id="body-body">
    <div id="app" class=" m-0 p-0">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-home" style="z-index: 3000;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('complexe Scolaire Mon Ecole') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <!--Admin manage link-->
                    @admin
                        <li class="nav-item dropdown mr-1">
                            <a id="dropdownTagLink" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Gestion') }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownTagLink">
                                <a class="dropdown-item" href="{{route('admin.index')}}">{{ __('L\'administration') }}</a>
                                <a class="dropdown-item" href="{{route('teachers.index')}}">{{ __('Enseignants') }}</a>
                                <a class="dropdown-item" href="{{route('pupils.index')}}">{{ __('Elèves') }}</a>
                                <a class="dropdown-item" href="{{route('classes.index')}}">{{ __('Classes') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Disciplines') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Parents d\'élèves') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Sécurité') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Inserer') }}</a>
                            </div>
                        </li>
                    @endadmin
                        <!-- Authentication Links -->
                        @guest
                            @urlNot('login')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}" >{{ __('Login') }}</a>
                                </li>
                            @endurlNot
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" id="register-link" href="#">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                                </a>
                                  <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                         <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> 
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
    {{-- SUCCESS MODAL --}}
    {{-- MODAL SUCCESS --}}

    <div class="modal fade" id="succesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 100px !important;">
        <div class="modal-dialog modal-sm text-center border border-white">
            <div class="modal-content box-color-register-home px-3 pb-3 shadow">
                <div class="w-100 mx-auto p-3">
                    <div class="mb-1 w-75 mx-auto" id="succesModalImage" style="display: none;">
                        <img src="{{asset('media/icons/mail2.png')}}" alt="" width="25">
                    </div>
                    <h5>You're successfully registred</h5>
                    <h5>Thank you for your subscribing</h5>
                    <h5 class="text-white font-italic">We login you in safe</h5>
                    <h6 class="text-right py-2">Click anywhere to close this popup</h6>
                </div>
            </div>
        </div>
    </div>
        
    {{-- END MODAL SUCCESS --}}
    {{-- Login modal --}}

        <div class="login-container mx-auto w-100 p-2" id="login-container" style="position: absolute; top: 100px; left: ; z-index: 3000; display: none;" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                    @if(session()->has('info'))
                        <h5 class="alert alert-{{session('type')}} w-100 mx-auto text-center">{{session('info')}}</h5>
                    @endif
                        <div class="card box-color-login mt-5 border border-white">
                            <div class="card-header text-center border-bottom border-white">{{ __('Login') }}</div>

                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End login modal --}}

        {{-- Modal register --}}
    <div class="modal-register-container" id="modal-register-container" style="position: fixed; top: 0px; left: 0; z-index: 3000; display: none; width: 100%; height: 100%; overflow: hidden; outline: 0; background-color: rgba(150, 150, 150, 0.9);">
        <div class="mx-auto register-modal-dialog m-0" id="register-modal-dialog" style="position: relative; top: 50px; width: 70%;">
            <div class="w-100 mx-auto m-0">
                <div class="row w-100 mx-auto m-0">
                    <div class="col-md-12 m-0">
                        <div class="card" style="min-height: 430px">
                            <div class="card box-color-register border border-white h-100">
                                <div class="card-header">{{ __('Register') }}</div>
                                <div class="card-body">
                                    <form method="POST" id="formRegister" role="form" action="{{ route('register') }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group row">
                                            <label class="col-md-4 control-label">Name</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="name" placeholder="Veuillez renseigner votre nom complet">
                                                <small class="help-block"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 control-label">E-Mail Address</label>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="email" placeholder="Veuillez renseigner votre adresse mail valide...">
                                                <small class="help-block"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 control-label">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password" placeholder="veuillez renseigner un mot de passe...">
                                                <small class="help-block"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez confirmer le mot de passe...">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                                <a href="#" id="cancel-register" class=" d-inline-block btn btn-secondary w-50 ml-1">
                                                    {{ __('Cancel') }}
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
        

        {{-- End modal register --}}

        <main class="">
            <div class="m-0 pt-1 mx-auto w-100 h-100">
                @yield('content')
            </div>
        </main>
    </div>
@yield('js')
</body>
</html>
