@auth
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
    <link href="{{ asset('css/admin-min.css') }}" rel="stylesheet">
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
            font-family: verdana;
            font-style: italic;
            letter-spacing: 0.07rem;
            font-weight: 100;
            text-shadow: 0px 0.5px 0.5px black;
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
    <div class="container-bg" id="container-bg-admin-min">
        <div class="container-mask maskor">
            <header class="maskor-sup">

            {{-- Navigation modal for lg or md screen --}}
                <div class="position-absolute d-none d-lg-inline text-left mt-2" style="top: 10px; left: 0%; width: 28%;">
                    <a class="link-float" href="#" id="link-home-school-name">
                        <span class="fa fa-school mr-2" style="font-size: 30px"></span>
                        <span class="mr-2 d-none d-lg-inline text-white small">Surveillance | Direction</span>
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

            {{-- Navigation MENU aside modal for small screen --}}
            <nav class="navbar d-lg-none shadow-sm navbar-home py-3">
                <div class="w-50" id="modal-home-nav-btn" style="cursor: pointer;">
                    <span class="">
                        <img src="{{asset('media/icons/menu.ico')}}" alt="" width="30">
                        <i class="fa fa-chevron-down" style="font-size: 25px; font-weight: small; position: relative; top: 5px; display: none"></i>
                    </span>
                    <span class="text-dark text-shadow d-md-inline d-none">Complexe Scolaire MON ECOLE</span>
                    <span class="text-muted d-sm-inline d-md-none">CS MON ECOLE</span>
                </div>
                
                {{-- Navigation MENU aside modal for small screen --}}
                    @extends('modals.homeMenuModalForSmallScreen')
                {{-- End Navigation MENU modal for small screen --}}
            </nav>
                @auth
                <div class="position-absolute justify-content-center admins-link mt-2 d-none d-lg-flex" style="top: 10px; right: 20px; width: 15%;">
                    <div class="text-center" style="min-width:45%;">
                        <a class="nav-link w-100 home-link-profil marker link-float" href="#">
                            <span class="mr-2 d-none d-lg-inline text-white-600 small">{{ Auth::user()->name }}  </span>
                             @admin
                                <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                            
                            @else
                                <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            @endadmin
                        </a>
                    </div>
                </div>
                {{-- For small screen --}}
                <div class="row position-absolute admins-link mt-2 d-lg-none" style="top: -10px; width: 25%; right: 30px">
               
                    <div class="col-12 text-center mb-2 px-0">
                        <a class="nav-link w-100 home-link-profil-sm link-float px-1" href="#">
                            @admin
                            <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                            @else
                            <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            @endadmin
                            <span class="d-block text-white-600 small text-center w-100">{{ mb_substr(Auth::user()->name, 0, 11) }}...</span>
                        </a>
                    </div>
                </div>
                {{-- endFor small screen --}}
                <div class="login-profil profil-modal position-relative border bg-linear-official border-white" style="width: 200px; display: none; top: 100px; z-index: 100;">
                    <div class="w-100 border" style="">
                        <a class="w-100 link-float d-inline-block border m-0 py-1" href="#">
                            <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            <span class="mr-2 d-none d-lg-inline text-dark float-right">{{ Auth::user()->name }}</span>
                        </a>
                          <!-- Dropdown - User Information -->
                        <div class="w-100 border">
                            @isTeacher
                                <a class="w-100 my-1 hover link-float" href="{{route('teacherAuthorized.show', Auth::user()->teacher()->id)}}" style="border-radius: 30px;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                  Profile
                                </a>
                            @endisTeacher
                            @admin
                                <a class="w-100 my-1 hover link-float" href="{{route('admin.index')}}" style="border-radius: 30px;">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                                  Administation
                                </a>
                                @isNotTeacher
                                    <a class="w-100 my-1 hover link-float" id="adminBecomeTeacherLink" href="#" style="border-radius: 30px;">
                                        <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                      Enseigner maintenant
                                    </a>
                                @endisNotTeacher
                                <a class="w-100 my-1 hover link-float" id="makeUserLink" href="#" style="border-radius: 30px;">
                                    <i class="fas fa-registered fa-sm fa-fw mr-2"></i>
                                  Créer un utilisateur
                                </a>
                            @endadmin
                            <a class="w-100 py-1 hover link-float" href="#">
                                 <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                              Activity Log
                            </a>
                            <a class="w-100 py-1 pb-2 hover border-top link-float" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                              Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div> 
                </div>
                @endauth     
            </header>

        </div>
        <div class="w-100 d-flex justify-content-center p-2" style="position: relative; top: 150px; max-height: 450px; overflow-y: auto;" id="container-contents-home">
            <div class="m-0 pt-2 mx-auto w-100 ">
                @yield('content')
            </div>
        </div>
    </div>

    </div>
    <footer class="footer mt-auto p-0 footer-home" id="footer-admin-min">
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
    </div>

   
{{-- MODAL SUCCESS --}}
    @extends('modals.success')        
{{-- END MODAL SUCCESS --}}


{{-- ADMIN TO TEACHER REGISTRED MODAL --}}
    @extends('modals.registredAdminToTeacher')
    @extends('modals.createUser')
 
{{-- END ADMIN TO TEACHER REGISTRED MODAL --}}

</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/jquery-ui.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
<script src="{{ asset('js/register-home.js') }}" defer></script>
<script src="{{ asset('js/admin-registerTeacher-home.js') }}" defer></script>
<script src="{{ asset('js/makeUser.js') }}" defer></script>
@yield('js')

</body>

</html>


@endauth