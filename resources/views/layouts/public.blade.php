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
            font-family: verdana;
            font-style: italic;
            letter-spacing: 0.07rem;
            font-weight: 100;
            text-shadow: 0.5px 0.5px 0.5px white;
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

            {{-- Navigation MENU aside modal for small screen --}}
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
            {{-- End Navigation MENU modal for small screen --}}
            </nav>
                @auth
                <div class="position-absolute justify-content-center admins-link mt-2 d-none d-lg-flex" style="top: 10px; right: 20px; width: 15%;">
                    <div class="text-center" style="min-width:45%;">
                        <a class="nav-link w-100 home-link-profil marker link-float" href="#">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                             @admin
                                <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                            
                            @else
                                <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            @endadmin
                        </a>
                    </div>
                </div>
                {{-- For small screen --}}
                <div class="row position-absolute admins-link mt-2 d-lg-none" style="top: -10px; width: 20%; right: 30px">
               
                    <div class="col-6 text-center mb-2">
                        <a class="nav-link w-100 home-link-profil-sm link-float" href="#">
                            @admin
                            <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                            @else
                            <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                            @endadmin
                            <span class="text-gray-600 small text-center">{{ mb_substr(Auth::user()->name, 0, 11) }}</span>

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
                                <a class="w-100 my-1 hover link-float" href="{{route('teachers.show', Auth::user()->teacher()->id)}}" style="border-radius: 30px;">
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

    <div class="modal fade" id="succesModalAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 100px !important;">
        <div class="modal-dialog modal-sm text-center border border-white">
            <div class="modal-content box-color-register-home px-3 pb-3 shadow">
                <div class="w-100 mx-auto p-3">
                    <div class="mb-1 w-75 mx-auto" id="succesModalImageAdmin" style="display: none;">
                        <img src="{{asset('media/icons/mail2.png')}}" alt="" width="25">
                    </div>
                    <h5>You're successfully registred</h5>
                    <h5>You're now a teacher</h5>
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

@auth
    {{-- REGISTRED ADMIN TO TEACHER MODAL --}}

    <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-md-n3 modal-md mt-5" style="position: relative;top: 50px;">
            <div class="modal-content bg-linear-official-50" style="border-style: solid; border-radius: 0; !important;">
                <span class="d-inline-block py-2 px-3 border align-self-end" id="closeAdminTeacherRegisterModal" style="">x</span>
                <div class="modal-header d-flex justify-content-between p-0 pl-2 m-0">
                    <h4 class="modal-title w-75 mb-0" id="adminModalLabel">Veuillez renseignez vos informations</h4>
                </div>
                <div class="modal-body w-100">

                    <form id="formRegisterAdmin" class="form-horizontal" role="form" method="POST" action="{{ route('admin.teacher.registration', auth()->user()->id) }}">
                        {!! csrf_field() !!}

                        

                        <div class="w-100 mx-auto">
                            <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                                <div class="" style="width: 74%">
                                    <label for="name" class="m-0 p-0">Nom et Prénoms de l'enseignant</label>
                                    <input type="text" class="form-control w-100" value="{{auth()->user()->name}}"  name="name" id="name" placeholder="Veuillez renseigner les nom et prenoms">
                                    <small class="help-block"></small>
                                </div>
                                <div style="width: 24%;" class="">
                                    <label for="level" class="m-0 p-0">Cycle</label>
                                    <select name="level" id="level" class="custom-select pb-0 mb-0">
                                        <option value="">Choisir le cycle</option>
                                        <option value="primary">Primaire</option>
                                        <option value="secondary">Secondaire</option>
                                        <option value="superior">Supérieur</option>
                                    </select>
                                    <small class="help-block m-0 p-0"></small>
                                </div>
                            </div>
                            <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                                <div style="width: 55%;" class="">
                                    <label for="subject_id" class="m-0 p-0">Spécialité</label>
                                    <select name="subject_id" id="subject_id" class="custom-select">
                                        <option value="">Choisir la spécialité</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="help-block m-0 p-0"></small>
                                </div>
                                <div style="width: 40%;" class="">
                                    <label for="classe" class="m-0 p-0">Classe</label>
                                    <select name="classe" id="classe" class="custom-select">
                                        <option value="">Choisir la classe</option>
                                        @foreach($classes as $c)
                                            <option value="{{$c->id}}" @if($c->teachers->toArray() !== []) disabled="" @endif >{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                                <div class="mx-auto" style="width: 48.8%;">
                                    <label for="email" class="m-0 p-0">E-mail de l'enseignant</label>
                                    <input type="email" value="{{auth()->user()->email}}" class="m-0 p-0 form-control p-1 " name="email" id="email" placeholder="Veuillez renseigner l'addresse mail">
                                    <small class="help-block"></small>
                                </div>
                                <div class="mx-auto" style="width: 48.8%;">
                                    <label for="birth" class="m-0 p-0">Date de naissance de l'enseignant</label>
                                    <input type="date" class="m-0 p-0 form-control p-1" name="birth" id="birth" placeholder="Veuillez renseigner la date de naissance">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                                <div class="mx-auto" style="width: 48.8%;">
                                    <label for="contact" class="m-0 p-0">Contacts de l'enseignant</label>
                                    <input type="text" class="m-0 p-0 form-control p-1" name="contact" id="contact" placeholder="Veuillez renseigner les contacts les séparer avec un '/'">
                                    <small class="help-block"></small>
                                </div>
                                <div class="mx-auto" style="width: 48.8%;">
                                    <label for="residence" class="m-0 p-0">Résidence de l'enseignant</label>
                                    <input type="text" class="m-0 p-0 form-control p-1" name="residence" id="residence" placeholder="Veuillez renseigner la résidence exemple 'Porto-Novo'">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class=" mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                                <div style="width: 31%;" class="">
                                    <label for="sexe" class="m-0 p-0">Sexe</label>
                                    <select name="sexe" id="sexe" class="custom-select">
                                        <option value="">Choisir le sexe</option>
                                        <option value="male">Masculin</option>
                                        <option value="female">Féminin</option>
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                                
                                <div style="width: 31%;">
                                    <label for="month" class="m-0 p-0">Le mois d'inscription</label>
                                    <select name="month" id="month" class="custom-select">
                                        <option value="">Choisissez le mois</option>
                                        @foreach($months as $m => $value)
                                            <option value="{{$value}}" @if($m == date('m') -1 ) selected="" @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <div style="width: 31%;">
                                    <label for="year" class="mb-0">L'année d'inscription</label>
                                    <select name="year" id="year" class="custom-select">
                                        <option value="">Choisissez l'année</option>
                                        @for($i = 1990; $i <= date('Y'); $i++)
                                            <option value="{{$i}}" @if($i == date('Y')) selected="" @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center w-50 mx-auto py-1 mt-2">
                            <button class="btn bg-linear-official-50 w-50" type="submit">Inserer Maintenant</button>
                        </div>
                    </form>                       
                </div>
            </div>
        </div>
    </div>
   
@endauth  


</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/jquery-ui.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
<script src="{{ asset('js/register-home.js') }}" defer></script>
<script src="{{ asset('js/admin-registerTeacher-home.js') }}" defer></script>
@yield('js')

</body>

</html>
