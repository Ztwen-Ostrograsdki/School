<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

<div class="border position-fixed" style="display:none ; top: 60px; left: 5%; z-index: 50000" id="modal-home-nav">
                    <nav class="navbar p-0" style="width: 200px;">
                        <div class=" border m-0 p-0 border-danger w-100">
                            <ul class="list-unstyled border w-100">
                                <li class="d-block w-100">
                                    <a href="#" class=" hover py-2 border-bottom fa-fa-link">
                                        <span class="fa fa-home" style="font-size: 25px"></span>
                                        <span class="ml-3">Home</span>
                                    </a>
                                </li>
                                <li class="d-block w-100">
                                    <a href="#" class=" hover py-2 border-bottom fa-fa-link">
                                        <span class="fa fa-tag" style="font-size: 25px"></span>
                                        <span class="ml-3">Menu</span>
                                    </a>
                                </li>
                                <li class="d-block w-100">
                                    <a href="#" class=" hover py-2 border-bottom fa-fa-link">
                                        <span class="fa fa-user-friends" style="font-size: 25px"></span>
                                        <span class="ml-3">Forum</span>
                                    </a>
                                </li>
                                <li class="d-block w-100">
                                    <a href="#" class=" hover py-2 border-bottom fa-fa-link">
                                        <span class="fa fa-user-o" style="font-size: 25px"></span>
                                        <span class="ml-3">Vous... parents</span>
                                    </a>
                                </li>
                                <li class="d-block w-100">
                                    <a href="#" class=" hover py-2 fa-fa-link-b">
                                        <span class="fa fa-phone" style="font-size: 25px"></span>
                                        <span class="ml-3">Contacts</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </div>

{{-- <nav class="d-none director d-lg-flex navbar mx-auto justify-content-center mt-2">
                    <div class="container w-100 m-0 p-0">
                        <ul class="row list-unstyled w-100 list-group-horizontal">
                            <li class="col-x-12 col-sm-3 col-md-3 d-flex justify-content-center text-center">
                                <a href="#" class="hover text-center py-2">Home</a>
                            </li>
                            <li class="col-sm-3 col-md-3 d-flex justify-content-center text-center">
                                <a href="#" class="hover text-center py-2">Menu</a>
                            </li>
                            <li class="col-sm-3 col-md-3 d-flex justify-content-center text-center">
                                <a href="#" class="hover text-center py-2">Forum</a>
                            </li>
                            <li class="col-sm-3 col-md-3 d-flex justify-content-center text-center">
                                <a href="#" class="hover text-center py-2">Contacts</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav> --}}




@auth

@extends('layouts.director')
@section('content')
    <div class="float-right" id="admin-principal-container" style="width: 100%;">
        <div class="d-flex flex-column justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-180">
            <div class="d-flex justify-content-around py-1 w-100">
                <div class="d-flex row justify-content-around" style="width: 100%">
                    <div class="border py-2 col-lg-5 col-md-12">
                        <div class="w-100 d-flex justify-content-between">
                            <div class="">
                                <h5 class="h5-title">Le Primaire</h5>
                            </div>
                            <div class="">
                                <span class="fa fa-close float-right p-1"></span>
                            </div>
                        </div>
                        <hr class="m-0" style="background-color: white">
                        <div class="mt-1 w-100">
                            <div class="w-100 d-flex justify-content-between">
                                <span class="fa fa-user fa-2x" ></span>
                                <span class="fa fa-2x">{{\App\Models\Teacher::whereLevel('primary')->count()}}</span>
                            </div>
                            <div class="w-100 d-block">
                                <span class="w-100 d-flex justify-content-around">
                                    <span class="m-0 p-0">
                                        <i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
                                    </span>
                                    <span class="m-0 p-0">
                                        <i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 border">
                        <div class="py-2" id="sup-tag" style="display: none; width: 0; opacity: 0">
                            <div class="d-flex justify-content-between tag-container" style="width: 100%">
                                <div style="width: 98.5%">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h5 class="h5-title">Le Supérieur</h5>
                                        </div>
                                        <div class="">
                                            <span class="fa fa-close float-right p-1"></span>
                                        </div>
                                    </div>
                                    <hr class="m-0" style="background-color: white">
                                    <div class="mt-1 w-100">
                                        <div class="w-100 d-flex justify-content-between">
                                            <span class="fa fa-user fa-2x text-white" ></span>
                                            <span class="fa fa-2x">700</span>
                                        </div>
                                        <div class="w-100 d-block">
                                            <span class="w-100 d-flex justify-content-around">
                                                <span class="m-0 p-0">
                                                    <i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
                                                </span>
                                                <span class="m-0 p-0">
                                                    <i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 float-right ml-3">
                                    <span class="fa fa-chevron-left float-right" id="chevron-sup" style="font-size: 12px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="py-2" id="sec-tag" style="width: 100%">
                            <div class="d-flex justify-content-between tag-container" style="width: 100%">
                                <div style="width: 98.5%">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h5 class="h5-title">Le Secondaire</h5>
                                        </div>
                                        <div class="">
                                            <span class="fa fa-close float-right p-1"></span>
                                        </div>
                                    </div>
                                    <hr class="m-0" style="background-color: white">
                                    <div class="mt-1 w-100">
                                        <div class="w-100 d-flex justify-content-between"> 
                                            <span class="fa fa-user fa-2x text-white" ></span>
                                            <span class="fa fa-2x">{{\App\Models\Teacher::whereLevel('secondary')->count()}}</span>
                                        </div>
                                        <div class="w-100 d-block">
                                            <span class="w-100 d-flex justify-content-around">
                                                <span class="m-0 p-0">
                                                    <i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
                                                </span>
                                                <span class="m-0 p-0">
                                                    <i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 float-right ml-3">
                                    <span class="fa fa-chevron-left float-right" id="chevron-sec" style="font-size: 12px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="fa fa-chevron-up"></span>
                </div>
            </div>
            <div class="w-100">
                <div class="w-100 my-1 p-1">
                    <div class="w-100 d-flex justify-content-between">
                        <div class="w-50 m-0">
                            <form action="">
                                <select id="select-p-level" class="custom-select w-50 bg-transparent text-success border-white">
                                    <option value=""  >Tous les Cycles</option>
                                    @foreach($levels as $level => $name)
                                        <option value="{{$level}}">{{ str_replace("Le", "Les enseignants du ", $name) }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="float-right px-2">
                            <span class="fa fa-user-plus p-2 border" title="Ajouter un nouvel enseignant" id="addNewTeacher"></span>
                        </div>
                    </div>
                    
                <hr class="m-0 mt-1" style="background-color: white">
                </div>

                <div class="container bg-transparent w-100 py-1">
                    <div class="w-100" style="min-height: 500px;">
                        <div class="w-90 m-0 p-0 mt-2" id="all-tags">
                            <table class="table-table table-striped w-100">
                                <thead>
                                    <th>#ID</th>
                                    <th class="text-left py-2">Name</th>
                                    <th>Email</th>
                                    <th>Contacts</th>
                                    <th>Localité</th>
                                    <th>Spécialité</th>
                                    <th>Actif depuis</th>
                                    <th>Classes</th>
                                    <th colspan="3">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                        @isSecondaryTeacher($teacher) <?php $teacher->subject->setSlug();?> @endisSecondaryTeacher
                                        <tr class="border-bottom border-dark">
                                            <td class="py-3">
                                                {{$teacher->id}}
                                            </td>
                                            <td class="text-left td-name">
                                                <a class="card-link" href="{{route('teachersm.show', $teacher->id)}}">{{$teacher->name}}
                                                <span title="{{$teacher->name}} est administrateur" class="{{ $teacher->hasUser() ? $teacher->user()->identifyAdminIcon() : ''}} text-white-50' style='font-size: 9px"></span>
                                                </a>

                                                <form class="d-inline float-right m-0 p-0 formEditGetData" method="get" action="{{route('teachersm.edit', $teacher->id)}}" title="card-link Editer les informations de {{ $teacher->name }}" >
                                                    <input hidden="" type="text" name="teacherData" value="{{$teacher->id}}">
                                                    <button class="bg-transparent m-0 p-0 fa fa-edit text-white-50 openEditPersonalTeacherModal" style="font-size: 10px!important; font-weight: 200!important; border: none;"></button>
                                                </form> 
                                            </td>
                                            <td class="td-email">
                                                {{$teacher->email}}
                                            </td>
                                            <td class="td-contact">
                                                {{$teacher->contact}}
                                            </td>
                                            <td class="td-residence">
                                                {{$teacher->residence}}
                                            </td>
                                            <td class="td-subject">
                                                @isSecondaryTeacher($teacher)
                                                    {{$teacher->subject->getSlug()}}
                                                @endisSecondaryTeacher
                                                @isPrimaryTeacher($teacher)
                                                    Maitre
                                                @endisPrimaryTeacher
                                            </td>
                                            <td class="td-year">
                                                {{$teacher->month.' '.$teacher->year}}
                                            </td>
                                            <td>
                                                <ul class="navbar-nav ml-auto bg-secondary rounded">
                                                    <li class="nav-item dropdown mr-1">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ __('0'.$teacher->classes->count().' classe(s)') }} <span class="caret"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @if($teacher->classes->count() > 0)
                                                                @foreach($teacher->classes as $classe)
                                                                    <a class="dropdown-item" href="#">{{ __($classe->name) }}</a>
                                                                @endforeach
                                                            @else
                                                                <a class="dropdown-item" href="#">{{ __('Octroyer maintenant') }}</a>
                                                            @endif   
                                                        </div>  
                                                        
                                                    </li>
                                                    
                                                </ul>   
                                            </td>
                                            
                                            <td>
                                                <ul class="navbar-nav ml-auto bg-success rounded">
                                                    <li class="nav-item dropdown mr-1">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Editer le role" v-pre>
                                                            <span class="fa fa-id-badge"></span> <span class="caret"></span>
                                                        </a>
                                                        
                                                        <div class="dropdown-menu bg-secondary dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @foreach($roles as $role => $value)
                                                            <form class="dropdown-item m-0 d-inline-block  w-100 " action="" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="w-100 btn btn-focus text-left p-0 m-0 text-white-50" >{{ $value }}</button>
                                                            </form>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                </ul>    
                                            </td>
                                            <td @notAdmin hidden="" @endnotAdmin>
                                                <form action="" method="post" class="m-0 d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-warning w-100" >
                                                        <img src="/media/icons/security.png" alt="" width="20">
                                                    </button>
                                                </form>
                                            </td>
                                            <td @notAdmin hidden="" @endnotAdmin>
                                                <form action="" method="post" class="m-0 d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger w-100" >
                                                        <img src="/media/icons/delete3d.ico" alt="" width="20">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            <footer class=" mt-1">
                                
                            </footer>
                        </div>

                        <div class="w-90 m-0 p-0 mt-2" id="secondary" style="display: none;">
                            <table class="table-table table-striped w-100">
                                <thead>
                                    <th>#ID</th>
                                    <th class="text-left">Name</th>
                                    <th>Email</th>
                                    <th>Contacts</th>
                                    <th>Localité</th>
                                    <th>Spécialité</th>
                                    <th>Actif depuis</th>
                                    <th>Classes</th>
                                    <th colspan="3">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($secondaryTeachers as $teacher)
                                        @isSecondaryTeacher($teacher) <?php $teacher->subject->setSlug();?> @endisSecondaryTeacher
                                        <tr class="border-bottom border-dark">
                                            <td class="py-3">
                                                {{$teacher->id}}
                                            </td>
                                            <td class="text-left td-name">
                                                <a class="card-link" href="{{route('teachersm.show', $teacher->id)}}">{{$teacher->name}}
                                                <span title="{{$teacher->name}} est administrateur" class="{{ $teacher->hasUser() ? $teacher->user()->identifyAdminIcon() : ''}} text-white-50' style='font-size: 9px"></span>
                                                </a>
                                                <form class="d-inline float-right m-0 p-0 formEditGetData" method="get" action="{{route('teachersm.edit', $teacher->id)}}" title="card-link Editer les informations de {{ $teacher->name }}" >
                                                    <input hidden="" type="text" name="teacherData" value="{{$teacher->id}}">
                                                    <button class="bg-transparent m-0 p-0 fa fa-edit text-white-50 openEditPersonalTeacherModal" style="font-size: 10px!important; font-weight: 200!important; border: none;"></button>
                                                </form> 
                                            </td>
                                            <td class="td-email">
                                                {{$teacher->email}}
                                            </td>
                                            <td class="td-contact">
                                                {{$teacher->contact}}
                                            </td>
                                            <td class="td-residence">
                                                {{$teacher->residence}}
                                            </td>
                                            <td class="td-subject">
                                                @isSecondaryTeacher($teacher)
                                                    {{$teacher->subject->getSlug()}}
                                                @endisSecondaryTeacher
                                                @isPrimaryTeacher($teacher)
                                                    Maitre
                                                @endisPrimaryTeacher
                                            </td>
                                            <td class="td-year">
                                                {{$teacher->month.' '.$teacher->year}}
                                            </td>
                                            <td>
                                                <ul class="navbar-nav ml-auto bg-secondary rounded">
                                                    <li class="nav-item dropdown mr-1">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ __('0'.$teacher->classes->count().' classe(s)') }} <span class="caret"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @if($teacher->classes->count() > 0)
                                                                @foreach($teacher->classes as $classe)
                                                                    <a class="dropdown-item" href="#">{{ __($classe->name) }}</a>
                                                                @endforeach
                                                            @else
                                                                <a class="dropdown-item" href="#">{{ __('Octroyer maintenant') }}</a>
                                                            @endif   
                                                        </div>  
                                                        
                                                    </li>
                                                    
                                                </ul>   
                                            </td>
                                            
                                            <td>
                                                <ul class="navbar-nav ml-auto bg-success rounded">
                                                    <li class="nav-item dropdown mr-1">
                                                        <a id="navbarDropdown" title="Editer le role"  class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <span class="fa fa-id-badge"></span> <span class="caret"></span>
                                                        </a>
                                                        

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @foreach($roles as $role => $value)
                                                            <form class="dropdown-item m-0 d-inline-block w-100 " action="" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="w-100 btn bg-transparent text-left p-0 m-0">{{ $value }}</button>
                                                            </form>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                </ul>    
                                            </td>
                                            <td @notAdmin hidden="" @endnotAdmin>
                                                <form action="" method="post" class="m-0 d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-warning w-100" >
                                                        <img src="/media/icons/security.png" alt="" width="20">
                                                    </button>
                                                </form>
                                            </td>
                                            <td @notAdmin hidden="" @endnotAdmin>
                                                <form action="" method="post" class="m-0 d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger w-100" >
                                                        <img src="/media/icons/delete3d.ico" alt="" width="20">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            <footer class=" mt-1">
                                
                            </footer>
                        </div>

                        <div class="w-90 m-0 p-0 mt-2" id="primary" style="display: none;">
                            <table class="table-table table-striped w-100">
                                <thead>
                                    <th>#ID</th>
                                    <th class="text-left">Name</th>
                                    <th>Email</th>
                                    <th>Contacts</th>
                                    <th>Localité</th>
                                    <th>Spécialité</th>
                                    <th>Actif depuis</th>
                                    <th>Classes</th>
                                    <th colspan="3">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($primaryTeachers as $teacher)
                                        @isSecondaryTeacher($teacher) <?php $teacher->subject->setSlug();?> @endisSecondaryTeacher
                                        <tr class="border-bottom border-dark">
                                            <td class="py-3">
                                                {{$teacher->id}}
                                            </td>
                                            <td class="text-left td-name">
                                                <a class="card-link" href="{{route('teachersm.show', $teacher->id)}}">{{$teacher->name}}
                                                <span title="{{$teacher->name}} est administrateur" class="{{ $teacher->hasUser() ? $teacher->user()->identifyAdminIcon() : ''}} text-white-50' style='font-size: 9px"></span>
                                                </a>
                                                <form class="d-inline float-right m-0 p-0 formEditGetData" method="get" action="{{route('teachersm.edit', $teacher->id)}}" title="card-link Editer les informations de {{ $teacher->name }}" >
                                                    <input hidden="" type="text" name="teacherData" value="{{$teacher->id}}">
                                                    <button class="bg-transparent m-0 p-0 fa fa-edit text-white-50 openEditPersonalTeacherModal" style="font-size: 10px!important; font-weight: 200!important; border: none;"></button>
                                                </form> 
                                            </td>
                                            <td class="td-email">
                                                {{$teacher->email}}
                                            </td>
                                            <td class="td-contact">
                                                {{$teacher->contact}}
                                            </td>
                                            <td class="td-residence">
                                                {{$teacher->residence}}
                                            </td>
                                            <td class="td-subject">
                                                @isSecondaryTeacher($teacher)
                                                    {{$teacher->subject->getSlug()}}
                                                @endisSecondaryTeacher
                                                @isPrimaryTeacher($teacher)
                                                    Maitre
                                                @endisPrimaryTeacher
                                            </td>
                                            <td class="td-year">
                                                {{$teacher->month.' '.$teacher->year}}
                                            </td>
                                            <td>
                                                <ul class="navbar-nav ml-auto bg-secondary rounded">
                                                    <li class="nav-item dropdown mr-1">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ __('0'.$teacher->classes->count().' classe(s)') }} <span class="caret"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @if($teacher->classes->count() > 0)
                                                                @foreach($teacher->classes as $classe)
                                                                    <a class="dropdown-item" href="#">{{ __($classe->name) }}</a>
                                                                @endforeach
                                                            @else
                                                                <a class="dropdown-item" href="#">{{ __('Octroyer maintenant') }}</a>
                                                            @endif   
                                                        </div>  
                                                        
                                                    </li>
                                                    
                                                </ul>   
                                            </td>
                                            
                                            <td>
                                                <ul class="navbar-nav ml-auto bg-success rounded">
                                                    <li class="nav-item dropdown mr-1">
                                                        <a id="navbarDropdown" title="Editer le role"  class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <span class="fa fa-id-badge"></span> <span class="caret"></span>
                                                        </a>
                                                        
                                                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @foreach($roles as $role => $value)
                                                            <form class="dropdown-item m-0 d-inline-block w-100 " action="" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="w-100 btn bg-transparent text-left p-0 m-0">{{ $value }}</button>
                                                            </form>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                </ul>    
                                            </td>
                                            <td @notAdmin hidden="" @endnotAdmin>
                                                <form action="" method="post" class="m-0 d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-warning w-100" >
                                                        <img src="/media/icons/security.png" alt="" width="20">
                                                    </button>
                                                </form>
                                            </td>
                                            <td @notAdmin hidden="" @endnotAdmin>
                                                <form action="" method="post" class="m-0 d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger w-100" >
                                                        <img src="/media/icons/delete3d.ico" alt="" width="20">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            <footer class=" mt-1">
                                
                            </footer>
                        </div>
                        {{-- @extends('elements.pupilsByClasses') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends('directors.teachers.edits.personal')
    @extends('directors.teachers.edits.newTeacher')
@endsection
@section('js')
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    
@endsection 
@endauth



        <div class="d-flex justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-50">
            <div class="d-flex row justify-content-around" style="width: 98.5%">
                <div class="border py-2 col-4">
                    <div class="w-100 d-flex justify-content-between">
                        <div class="">
                            <h5 class="h5-title">Enseignants</h5>
                        </div>
                        <div class="">
                            <span class="fa fa-close float-right p-1"></span>
                        </div>
                    </div>
                    <hr class="m-0" style="background-color: white">
                    <div class="mt-1 w-100">
                        <a href="{{route('teachersm.index')}}" class="w-100 d-flex link-white mt-1 d-flex justify-content-between">
                            <span class="fa fa-user fa-2x" ></span>
                            <span class="fa fa-2x">{{\App\Models\Teacher::all()->count()}}</span>
                        </a>
                        <div class="w-100 d-block">
                            <span class="w-100 d-flex justify-content-around">
                                <span class="m-0 p-0">
                                    <i class="text-white-50 h5-title ">Primaire:</i> <i class="text-white-50 h5-title ">{{\App\Models\Teacher::whereLevel('primary')->count()}}</i>
                                </span>
                                <span class="m-0 p-0">
                                    <i class="text-white-50 h5-title ">Secondaire:</i> <i class="text-white-50 h5-title ">{{\App\Models\Teacher::whereLevel('secondary')->count()}}</i>
                                </span>
                                <span class="m-0 p-0">
                                    <i class="text-white-50 h5-title ">Supérieur:</i> <i class="text-white-50 h5-title ">100</i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="border py-2 col-3">
                    <div class="w-100 d-flex justify-content-between">
                        <div class="">
                            <h5 class="h5-title">Personnel administratif</h5>
                        </div>
                        <div class="">
                            <span class="fa fa-close float-right p-1"></span>
                        </div>
                    </div>
                    <hr class="m-0" style="background-color: white">
                    <div class="mt-1 d-flex justify-content-between">
                        <span class="fa fa-user fa-2x" ></span>
                        <span class="fa fa-2x">{{(\App\User::whereRole('admin')->count()) + (\App\User::whereRole('superAdmin')->count())}}</span>
                    </div>
                </div>
                <div class="border py-2 col-2">
                    <div class="w-100 d-flex justify-content-between">
                        <div class="">
                            <h5 class="h5-title">Apprenants</h5>
                        </div>
                        <div class="">
                            <span class="fa fa-close float-right p-1"></span>
                        </div>
                    </div>
                    <hr class="m-0" style="background-color: white">
                    <a href="{{route('pupilsm.index')}}" class="link-white mt-1 d-flex justify-content-between">
                        <span class="fa fa-book fa-2x" ></span>
                        <span class="fa fa-2x">{{\App\Models\Pupil::all()->count()}}</span>
                    </a>
                </div>
                <div class="col-2 border">
                    <div class="py-2" id="users-tag" style="display: none; width: 0; opacity: 0">
                        <div class="d-flex justify-content-between tag-container" style="width: 100%">
                            <div style="width: 98.5%">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h5 class="h5-title">Utilisateurs</h5>
                                    </div>
                                    <div class="">
                                        <span class="fa fa-close float-right p-1"></span>
                                    </div>
                                </div>
                                <hr class="m-0" style="background-color: white">
                                <a href="{{route('users.index')}}" class="mt-1 link-white d-flex justify-content-between">
                                    <div>
                                        <span class="fa fa-user fa-2x text-white" ></span>
                                    </div>
                                    <span class="fa fa-2x">{{\App\User::all()->count()}}</span>
                                </a>
                            </div>
                            <div class="py-4 float-right ml-3">
                                <span class="fa fa-chevron-left float-right" id="chevron-users" style="font-size: 12px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="py-2" id="parents-tag" style="width: 100%">
                        <div class="d-flex justify-content-between tag-container" style="width: 100%">
                            <div style="width: 98.5%">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h5 class="h5-title">Parents d'élèves</h5>
                                    </div>
                                    <div class="">
                                        <span class="fa fa-close float-right p-1"></span>
                                    </div>
                                </div>
                                <hr class="m-0" style="background-color: white">
                                <div class="mt-1 d-flex justify-content-between">
                                    <div>
                                        <span class="fa fa-baby fa-2x text-white" ></span>
                                    </div>
                                    <span class="fa fa-2x">1500</span>
                                </div>
                            </div>
                            <div class="py-4 float-right ml-3">
                                <span class="fa fa-chevron-left float-right" id="chevron-parents" style="font-size: 12px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <span class="fa fa-chevron-up"></span>
            </div>
            
        </div>



{{-- ADMIN LAYAOUT --}}

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
        <div class="container-mask maskor" id="admin-main">
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
                    <admin-menu></admin-menu>
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