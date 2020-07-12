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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
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
    <div class="container-bg" id="container-bg-admin">
        <div class="container-mask maskor">
            <header class="maskor-sup">
                <div class="w-100 m-0 p-0 border d-flex justify-content-between bg-linear-official-dark" style="background-color:;">
                    <div class="d-lg-inline text-left" style="width: 20%;">
                        <a class="link-float w-100 h-100" href="#" id="open-admin-aside">
                            <span class="fa fa-school mr-2 mt-3" style="font-size: 30px"></span>
                            <span class="mr-2 d-none d-lg-inline text-white small">ADMINISTRATION</span>
                        </a>
                    </div>
                    <div class="ml-3 row" style="width: 60%;">
                        <div class="col-8 h-100">
                            <div class="w-100 d-flex justify-content-start h-100 pt-3" style="">
                                <form action="" class="bg-transparent h-50 d-none" id="form-admin-search" style="">
                                    <input type="search" id="input" class="form-control bg-transparent border py-1 text-white d-inline-block" style="border: none; " placeholder="Enter your search...">
                                    <button class="border text-white bg-linear-official rounded" style="border: none; width: 25%; padding-top: 6px; padding-bottom: 6px;">Search</button>
                                        <span class="fa fa-close mt-3 float-right" id="search-admin-close" style="cursor: pointer; display: none">
                                        </span>
                                </form>
                                <span class="fa fa-search mt-3 mx-1 position-relative" id="search-admin-link" style="cursor: pointer;">
                                </span>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end py-3">
                            <div class="w-50 mr-2">
                                <form action="">
                                    <select name="" id="" class="custom-select border-dark bg-transparent text-dark" style="">
                                        @for($i = 1990; $i <= date('Y'); $i++)
                                            <option value="{{$i}}" @if($i == date('Y')) selected @endif >{{$i}}</option>
                                        @endfor
                                    </select>
                                </form>
                            </div>
                            <div class="w-auto m-0 p-0 mt-3">
                                <i class="fas fa-bell fa-1x fa-fw"></i>
                                <span class="badge badge-danger badge-counter position-relative" style="right:35%; bottom: 10px; font-size: 5px">3+</span>
                            </div>
                            <div class="mt-3">
                                <i class="fas fa-comments fa-1x text-gray-300"></i>
                            </div>
                            
                        </div>
                    </div>
                    <div class="justify-content-center admins-link mt-2 d-none d-lg-flex" style="width: 15%;">
                        <div class="text-center" style="min-width:45%;">
                            <span class="nav-link w-100 admin-profil marker link-float" style="cursor: pointer;">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small">{{ Auth::user()->name }} </span>
                                 @admin
                                    <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                                
                                @else
                                    <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                                @endadmin
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Navigation MENU aside modal --}}
                    @extends('modals.menu-admin')
                {{-- End Navigation MENU modal --}}
                <div class="login-profil profil-modal position-relative border bg-linear-official-50 border-white" style="width: 200px; display: none; top: 3px; z-index: 100;">
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
            </header>

        </div>
        <div class="w-100 p-1" style="position: relative; top: 70px; max-height: 700px; overflow-y: auto;" id="container-contents-home">
            <div class="m-0 pt-2 mx-auto w-100 ">
                @yield('content')
            </div>
        </div>
    </div>

    </div>
    <footer class="footer mt-auto p-0 footer-home" id="footer-admin">
    <div id="footer-maskor" class="px-3 py-2 m-0">
        

    </div>

   
{{-- MODAL SUCCESS --}}
    @extends('modals.success')        
{{-- END MODAL SUCCESS --}}


{{-- ADMIN TO TEACHER REGISTRED MODAL --}}
    @extends('modals.registredNewTeacher')
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
<script src="{{ asset('js/registredNewTeacher.js') }}" defer></script>
<script src="{{ asset('js/editTeachers.js') }}" defer></script>
<script src="{{ asset('js/makeUser.js') }}" defer></script>
<script src="{{ asset('js/all-index-js.js') }}" defer></script>
@yield('js')

</body>

</html>


@endauth