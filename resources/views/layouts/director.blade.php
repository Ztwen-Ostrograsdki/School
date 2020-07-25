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
    <div class="container-bg app" id="container-bg-admin">
        <div class="container-mask maskor" id="admin-principal-container">
            <admin-sidebar></admin-sidebar> 
            <div class="w-100 my-1" style="max-height: 720px; overflow-y: auto;">
                <router-view></router-view>
            </div>           
        </div>
        <div class="w-100 p-0 px-1" style="position: relative; top: 90px; max-height: 700px; overflow-y: auto;" id="container-contents-home">
            <div class="m-0 pt-2 mx-auto w-auto">
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