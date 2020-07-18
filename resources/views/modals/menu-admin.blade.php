
<div id="wrapper-admin" class="position-absolute modal-home-nav-admin border-right border-bottom" style="top: -13px; left: 0.0; display:none ; z-index: 10000; background-image: url(/media/img/art-2578353_1920.jpg) !important; background-position: -200px 200px; padding: 0px;" >
    <ul class="menu" style="width: 99%;">
        <li class="item1 text-left">
            <a @if(Route::getCurrentRoute()->uri() !== "admin/director/master") href="{{route('master.index')}}" @else href="#"  @endif>
                <i class="fa fa-home float-left mt-1 mr-3" style="font-size: 25px"></i>Dashboard
            </a>
        </li>
        <li class="item2">
            <a href="#">
                <i class="fa fa-book float-left mt-1 mr-3" style="font-size: 25px"></i>Apprenants 
                <span id="span-counter">{{\App\Models\Pupil::all()->count()}}</span>
            </a>
            <ul>
                <li class="subitem1">
                    <a @if(Route::getCurrentRoute()->uri() !== "admin/director/masterPupils") href="{{route('pupilsm.index')}}" @else href="#"  @endif >Tous les Apprenants
                    </a>
                </li>
                <li class="subitem1"><a href="#">Primaires</a></li>
                <li class="subitem2"><a href="#">Secondaires</a></li>
                <li class="subitem3"><a href="#">Supérieur</a></li>
            </ul>
        </li>
        <li class="item3">
            <a href="#">
                <i class="fa fa-user-friends float-left mt-1 mr-3" style="font-size: 25px"></i>Enseignants 
                <span id="span-counter">{{\App\Models\Teacher::all()->count()}}</span>
            </a>
            <ul>
                <li class="subitem1">
                    <a @if(Route::getCurrentRoute()->uri() !== "admin/director/masterTeachers") href="{{route('teachersm.index')}}" @else href="#"  @endif >Tous les enseignants
                    </a>
                </li>
                <li class="subitem1"><a href="#">Primaires</a></li>
                <li class="subitem2"><a href="#">Secondaires</a></li>
                <li class="subitem3"><a href="#">Supérieur</a></li>
            </ul>
        </li>
        <li class="item4">
            <a href="#">
                <i class="fa fa-money float-left mt-1 mr-3" style="font-size: 25px"></i>Gestion - Finances 
                <span id="span-counter">222</span>
            </a>
            <ul>
                <li class="subitem1"><a href="#">Scolarité </a></li>
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
