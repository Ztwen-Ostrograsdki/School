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