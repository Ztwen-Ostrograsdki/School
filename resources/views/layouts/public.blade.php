<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/v4-shims.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custumise.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav-menu-lg.css') }}" rel="stylesheet">
    @yield('css')
    <style>
        form div, form label, form small{
            margin: 0;
            padding: 0;
        }

        form input+input{
            margin-top: 0px;
        }

        .help-block{
            font-family: cursive;
            letter-spacing: 0.07rem;
            text-shadow: 0.5px 0.5px 0.5px black;
        }

        .fa-fa-link-b:hover .fa-phone{
            color: cyan;
            transform: rotate(180deg);
        }
        .fa-fa-link:hover span.fa{
            color: cyan;
        }

        .login-profil a.hover:hover{
            border-bottom: 1px solid white;
            border-radius: 30px;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <div class="mask w-100 h-100" id="mask" style="position: absolute;top: 0; left: 0; display: none; z-index: 10; background-color: rgba(150, 150, 150, 0.9);"></div>
    <div class="container-bg">
        <div class="container-mask maskor">
            <header class="maskor-sup">

            {{-- Navigation modal for lg or md screen --}}
                <div class="position-absolute d-none d-lg-inline text-left mt-2" style="top: 10px; left: 0%; width: 28%;">
                    <a class="link-float" href="#" id="link-home-school-name">
                        <span class="fa fa-school mr-2" style="font-size: 30px"></span>
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Complexe Scolaire Mon Ecole</span>
                    </a>
                </div>
                <div class="d-none w-100 d-lg-flex justify-content-center mx-auto position-absolute" style="top: 35px">
                    <ul class="d-flex justify-content-center mt-2" id="nav-menu">
                        <li><a href="#"><span class="mkv-d"></span>Home</a></li>
                        <li><a href="#"><span class="mkv-d"></span>Menu</a>
                            <ul class="row">
                                <li class="col-12"><a href="#" class="documents">Documents</a></li>
                                <li lass="col-12"><a href="#" class="messages w-auto">Messages</a></li>
                                <li lass="col-12"><a href="#" class="signout">Sign Out</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="mkv-d"></span>Forum</a></li>
                        <li><a href="#"><span class="mkv-d"></span>Espace Parents</a></li>
                        <li><a href="#"><span class="mkv-d"></span>Contacts</a></li>
                    </ul> 
                </div>
                
            {{-- EndNavigation modal for lg or md screen --}}

            {{-- Navigation modal for small screen --}}
            <nav class="navbar d-lg-none shadow-sm navbar-home">
                <div class="w-50" id="modal-home-nav-btn" style="cursor: pointer;">
                    <span class="">
                        <img src="{{asset('media/icons/menu.ico')}}" alt="" width="30">
                        <i class="fa fa-chevron-down" style="font-size: 25px; font-weight: small; position: relative; top: 5px; display: none"></i>
                    </span>
                    <span class="text-muted d-md-inline d-none">Complexe Scolaire MON ECOLE</span>
                    <span class="text-muted d-sm-inline d-md-none">CS MON ECOLE</span>
                </div>
                
                <div id="wrapper" class="position-fixed modal-home-nav" style="top: -30px; left: 0.5%; display: none; z-index: 10000;">
                    <ul class="menu" style="width: 90%;">
                        <li class="item1 text-left">
                            <a href="#">
                                <i class="fa fa-home float-left mt-1 mr-3" style="font-size: 25px"></i>Home
                            </a>
                        </li>
                        <li class="item2">
                            <a href="#">
                                <i class="fa fa-tag float-left mt-1 mr-3" style="font-size: 25px"></i>Menu 
                                <span id="span-counter">147</span>
                            </a>
                            <ul>
                                <li class="subitem1"><a href="#">Cute Kittens</a></li>
                                <li class="subitem2"><a href="#">Strange “Stuff” </a></li>
                                <li class="subitem3"><a href="#">Automatic Fails </a></li>
                            </ul>
                        </li>
                        <li class="item3">
                            <a href="#">
                                <i class="fa fa-user-friends float-left mt-1 mr-3" style="font-size: 25px"></i>Forum 
                                <span id="span-counter">340</span>
                            </a>
                            <ul>
                                <li class="subitem1"><a href="#">Cute Kittens </a></li>
                                <li class="subitem2"><a href="#">Strange “Stuff” </a></li>
                                <li class="subitem3"><a href="#">Automatic Fails</a></li>
                            </ul>
                        </li>
                        <li class="item4">
                            <a href="#">
                                <i class="fa fa-user-o float-left mt-1 mr-3" style="font-size: 25px"></i>Vous etes parent 
                                <span id="span-counter">222</span>
                            </a>
                            <ul>
                                <li class="subitem1"><a href="#">Cute Kittens </a></li>
                                <li class="subitem2"><a href="#">Strange “Stuff”</a></li>
                                <li class="subitem3"><a href="#">Automatic Fails </a></li>
                            </ul>
                        </li>
                        <li class="item5">
                            <a href="#">
                                <i class="fa fa-phone float-left mt-1 mr-3" style="font-size: 25px"></i>Contacts
                                <span id="span-counter">16</span>
                            </a>
                            <ul>
                                <li class="subitem1"><a href="#">Cute Kittens </a></li>
                                <li class="subitem2"><a href="#">Strange “Stuff” </a></li>
                                <li class="subitem3"><a href="#">Automatic Fails </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            {{-- End Navigation modal for small screen --}}
            </nav>
                @auth
                <div class="position-absolute justify-content-center admins-link mt-2 d-none d-lg-flex" style="top: 10px; right: 20px; width: 26%;">
                @admin
                    <div class="text-center" style="min-width:45%; ">
                        <a class="nav-link w-100 marker link-float" href="{{route('admin.index')}}">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ (__('Admin')) }}</span>
                            <span class="fa fa-user-secret" style="font-size: 25px"></span>
                        </a>
                    </div>
                @endadmin
                    <div class="text-center" style="min-width:45%;">
                        <a class="nav-link w-100 home-link-profil marker link-float" href="#">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                        </a>
                    </div>
                </div>
                {{-- For small screen --}}
                <div class="row position-absolute admins-link mt-2 d-lg-none" style="top: -10px; right: 3%; width: 20%;">
                @admin
                    <div class="text-center col-6 mb-2">
                        <a class="nav-link w-100 link-float" href="{{route('admin.index')}}">
                            <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                            <span class="text-gray-600 small m-0">{{ (__('Admin')) }}</span>

                        </a>
                    </div>
                @endadmin
                    <div class="col-6 text-center mb-2">
                        <a class="nav-link w-100 home-link-profil-sm link-float" href="#">
                            <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            <span class="text-gray-600 small">{{ Auth::user()->name }}</span>

                        </a>
                    </div>
                </div>
                {{-- endFor small screen --}}
                <div class="login-profil profil-modal border border-white" style="width: 200px; display: none;">
                    <div class="w-100 border" style="">
                        <a class="w-100 d-inline-block border m-0 py-1" href="#">
                            <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 float-right">{{ Auth::user()->name }}</span>
                        </a>
                          <!-- Dropdown - User Information -->
                        <div class="w-100 border">
                            <a class="w-100 my-1 hover" href="#" style="border-radius: 30px;">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Profile
                            </a>
                            <a class="w-100 py-1 hover" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                              Settings
                            </a>
                            <a class="w-100 py-1 hover" href="#">
                                 <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                              Activity Log
                            </a>
                            <a class="w-100 py-1 pb-2 hover border-top" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div> 
                </div>
                @endauth    
                @guest
                    @if (Route::has('login'))
                        <div class="position-absolute register-home-links border  d-none d-lg-flex justify-content-between text-center mt-2" style="top: 10px; right: 3%; width: 15%; border-radius: 10px">
                            <a href="{{ route('login') }}" class="py-1 link-float">Login</a>
                            @if (Route::has('register'))
                                <a href="#" id="register-link-home" class="register-link py-1 link-float">Register</a>
                            @endif
                        </div>
                        <div class="position-absolute row register-home-links d-lg-none text-center mt-2" style="top:0; right: 50px; width: auto; border-radius: 10px">
                            <div class="container-lg d-inline m-0 p-0 mr-3">
                                <a href="{{ route('login') }}" class="py-1 col-5 link-float">Login</a>
                                @if (Route::has('register'))
                                <a href="#" id="register-link-home-sm" class="register-link-sm link-float py-1 col-6">Register</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endguest    
            </header>

        </div>
        <div class="w-100 d-flex justify-content-center p-2" style="position: relative; top: 150px; max-height: 450px; overflow-y: auto;" id="container-contents-home">
            <div class="m-0 pt-2 mx-auto w-100 ">
                @yield('content')
            </div>
        </div>
    </div>

    </div>
    <footer class="footer mt-auto p-0 footer-home">
    <div id="footer-maskor" class="px-3 py-2 m-0">
        <div class="row m-0 p-0 w-100">
            <div class="footer-left col-md-3 col-sm-12 d-none d-md-inline px-3 py-0 border">
                <div class="m-0 p-0">
                    <h5 class="text-center w-75 mx-auto">Complexe Scolaire Bilingue</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aspernatur, perferendis adipisci eligendi ea voluptatem dolores distinctio, earum officiis ab, excepturi enim necessitatibus alias amet natus iusto ipsum illo quasi!
                    </p>
                </div>
                <div class="mt-2 p-0">
                    
                </div>
            </div>
            <div class="footer-center col-md-3 col-sm-12 border py-2 mx-md-1 d-flex justify-content-center">
                
                <div class="c-footer">
                    <h5 class="text-center w-75 mx-auto">Nous suivre</h5>
                    <nav class="m-0 p-0 w-100">
                        <a href="#" class="facebook"></a>
                        <a href="#" class="twitter"></a>
                        <a href="#" class="instagram"></a>
                        <a href="#" class="youtube"></a>
                        <a href="#" class="gmail"></a>
                    </nav>
                </div>
            </div>
            <div class="footer-right col-md-5 col-sm-12 row border">
                <div class="col-md-5 col-sm-6 py-2 m-1">
                    <h5 class="text-center w-75 mx-auto">Nous contacter Par</h5>
                    <ul class="mx-auto px-3">
                        <li>
                            <a href="#">
                                <img src="/media/icons/mail2.png" alt="" width="18" class="mr-2">
                                E-mail
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/group.png" alt="" width="18" class="mr-2">
                                Tchat
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/whatsApp.png" alt="" width="18" class="mr-2">
                                Whats'App
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/messenger.png" alt="" width="18" class="mr-2">
                                Messenger
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-5 py-2 m-1">
                    <h5 class="text-center w-75 mx-auto">Divers</h5>
                    <ul class="mx-auto px-3">
                        <li>
                            <a href="#">
                                <img src="/media/icons/calendar-clock.png" alt="" width="18" class="mr-2">
                                Obtenir un entretien
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/about1.png" alt="" width="18" class="mr-2">
                                A propos
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/media/icons/security.png" alt="" width="18" class="mr-2">
                                Politique de confidentialités
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-1 border w-75 mx-auto d-none d-lg-flex justify-content-center">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum voluptates, numquam perferendis accusamus tempora necessitatibus vero dolor et ipsa eveniet minus dolore quis officia quasi, quas illo maxime, reiciendis consequatur.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum voluptates, numquam perferendis accusamus tempora necessitatibus vero dolor et ipsa eveniet minus dolore quis officia quasi, quas illo maxime, reiciendis consequatur.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum voluptates, numquam perferendis accusamus tempora necessitatibus vero dolor et ipsa eveniet minus dolore quis officia quasi, quas illo maxime, reiciendis consequatur.
            </p>
        </div>
    </div>

   
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
                    <h6 class="text-right py-2">Click anywhere to close this popup</h6>
                </div>
            </div>
        </div>
    </div>
        
    {{-- END MODAL SUCCESS --}}


    {{-- REGISTRED MODAL --}}
   
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-md-n3 modal-md mt-5" style="position: relative;top: 90px;">
            <div class="modal-content box-color-register-home">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                    <div class="w-100 d-flex justify-content-between">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                        
                    </div>
                </div>
                <div class="modal-body w-100">

                    <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group w-100">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control w-100" name="name">
                                <small class="help-block"></small>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control w-100" name="email">
                                <small class="help-block"></small>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="password">
                                <small class="help-block"></small>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group w-100 mx-auto">
                            <div class="w-75 d-flex justify-content-center mx-auto">
                                <button type="submit" class="btn btn-primary w-50">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>                       
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/jquery-ui.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
<script src="{{ asset('js/register-home.js') }}" defer></script>
@yield('js')

</body>

</html>
