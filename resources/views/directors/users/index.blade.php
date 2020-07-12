@auth

@extends('layouts.director')
@section('content')
	<div class="float-right" id="admin-principal-container" style="width: 100%;">
		<div class="d-flex flex-column justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-180">
			<div class="d-flex justify-content-around py-1 w-100">
				<div class="d-flex row justify-content-around" style="width: 100%">
					<div class="border py-2 col-lg-3 col-md-12">
						<div class="w-100 d-flex justify-content-between">
							<div class="">
								<h5 class="h5-title">Les administrateurs</h5>
							</div>
							<div class="">
								<span class="fa fa-close float-right p-1"></span>
							</div>
						</div>
						<hr class="m-0" style="background-color: white">
						<div class="mt-1 w-100">
							<div class="w-100 d-flex justify-content-between">
								<span class="fa fa-user fa-2x" ></span>
								<span class="fa fa-2x">{{\App\User::whereRole('admin')->count() + \App\User::whereRole('superAdmin')->count()}}</span>
							</div>
							<div class="w-100 d-block">
								<span class="w-100 d-flex justify-content-around">
									<span class="m-0 p-0">
										<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote </i>
									</span>
									<span class="m-0 p-0">
										<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France</i>
									</span>
								</span>
							</div>
						</div>
					</div>
					<div class="border py-2 col-lg-3 col-md-12">
						<div class="w-100 d-flex justify-content-between">
							<div class="">
								<h5 class="h5-title">Les Enseignants</h5>
							</div>
							<div class="">
								<span class="fa fa-close float-right p-1"></span>
							</div>
						</div>
						<hr class="m-0" style="background-color: white">
						<div class="mt-1 w-100">
							<div class="w-100 d-flex justify-content-between">
								<span class="fa fa-user fa-2x" ></span>
								<span class="fa fa-2x">{{\App\User::whereRole('teacher')->count()}}</span>
							</div>
							<div class="w-100 d-block">
								<span class="w-100 d-flex justify-content-around">
									<span class="m-0 p-0">
										<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote </i>
									</span>
									<span class="m-0 p-0">
										<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France</i>
									</span>
								</span>
							</div>
						</div>
					</div>
					
					<div class="col-lg-5 col-md-12 border">
						<div class="py-2" id="sup-tag" style="display: none; width: 0; opacity: 0">
							<div class="d-flex justify-content-between tag-container" style="width: 100%">
								<div style="width: 98.5%">
									<div class="d-flex justify-content-between">
										<div class="">
											<h5 class="h5-title">Les parents d'éléves</h5>
										</div>
										<div class="">
											<span class="fa fa-close float-right p-1"></span>
										</div>
									</div>
									<hr class="m-0" style="background-color: white">
									<div class="mt-1 w-100">
										<div class="w-100 d-flex justify-content-between">
											<span class="fa fa-user fa-2x text-white" ></span>
											<span class="fa fa-2x">{{\App\User::whereRole('parent')->count()}}</span>
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
											<h5 class="h5-title">Les Visiteurs</h5>
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
									<option value="">Les utilisateurs</option>
									<option value="teachers">Les Enseignants</option>
									<option value="parents">Les parents d'élèves</option>
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
									<th class="text-left">Name</th>
									<th>Email</th>
									<th>Actif depuis</th>
									<th colspan="3">Actions</th>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr class="border-bottom border-dark">
											<td>
												{{$user->id}}
											</td>
											<td class="text-left">
												<a class="card-link" href="#">{{$user->name}} @isAdmin($user) <span class="fa fa-key text-white-50 ml-2" style="font-size: 9px"></span> @endisAdmin </a>  
												<a href="#" title="card-link Editer les informations de {{ $user->name }}" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important">
													
												</a> 
											</td>
											<td>
												{{$user->email}}
											</td>
											<td>
												Avril 2020
											</td>
											
											<td>
												<ul class="navbar-nav ml-auto bg-success rounded">
													<li class="nav-item dropdown mr-1">
						                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Editer le role" v-pre>
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
												<form action="" method="post" class="d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
													@csrf
													@method('DELETE')
													<button class="btn btn-warning w-100" >
														<img src="/media/icons/security.png" alt="" width="20">
													</button>
												</form>
											</td>
											<td @notAdmin hidden="" @endnotAdmin>
												<form action="" method="post" class="d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
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
						<div class="w-90 m-0 p-0 mt-2" id="teachers" style="display: none;">
							<table class="table-table table-striped w-100">
								<thead>
									<th>#ID</th>
									<th class="text-left">Name</th>
									<th>Email</th>
									<th>Spécialité</th>
									<th>Actif depuis</th>
									<th>Classes</th>
									<th colspan="3">Actions</th>
								</thead>
								<tbody>
									@foreach($teachers as $teacher)
										<tr class="border-bottom border-dark">
											<td>
												{{$teacher->id}}
											</td>
											<td class="text-left">
												<a class="card-link" href="{{route('teachersm.show', $teacher->id)}}">{{$teacher->name}}
												<a href="#" title="card-link Editer les informations de {{ $teacher->name }}" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important"></a> 
											</td>
											<td>
												{{$teacher->email}}
											</td>
											<td>
												@isSecondaryTeacher($teacher->teacher())
													{{($teacher->teacher())->subject->name}}
												@endisSecondaryTeacher
												@isPrimaryTeacher($teacher->teacher())
													Maitre
												@endisPrimaryTeacher
											</td>
											<td>
												{{$teacher->teacher()->month.' '.$teacher->teacher()->year}}
											</td>
											<td>
												<ul class="navbar-nav ml-auto bg-linear-official rounded">
													<li class="nav-item dropdown mr-1">
						                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						                                    {{ __('0'.($teacher->teacher())->classes->count().' classe(s)') }} <span class="caret"></span>
						                                </a>
						                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
															@if($teacher->teacher()->classes->count() > 0)
																@foreach($teacher->teacher()->classes as $classe)
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
						                                    <form class="dropdown-item d-inline-block w-100 " action="" method="post">
																@csrf
																@method('PUT')
																<button class="w-100 btn bg-transparent text-left p-0 m-0">{{ __('Admin') }}</button>
						                                    </form>
						                                    <form class="dropdown-item d-inline-block w-100 " action="" method="post">
																@csrf
																@method('PUT')
																<button class="w-100 btn bg-transparent text-left p-0 m-0">{{ __('User') }}</button>
						                                    </form>
						                                    <a class="dropdown-item" href="#">{{ __('Autre') }}</a>
						                                </div>
						                            </li>
						                        </ul>    
											</td>
											<td @notAdmin hidden="" @endnotAdmin>
												<form action="" method="post" class="d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
													@csrf
													@method('DELETE')
													<button class="btn btn-warning w-100" >
														<img src="/media/icons/security.png" alt="" width="20">
													</button>
												</form>
											</td>
											<td @notAdmin hidden="" @endnotAdmin>
												<form action="" method="post" class="d-inline-block w-100" onsubmit="return confirm('Voulez-vous vraiment Bloquer cet utilisateur?')">
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
@endsection
@section('js')
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    
@endsection	
@endauth