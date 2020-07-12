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
								<span class="fa fa-2x">{{\App\Models\Pupil::whereLevel('primary')->count()}}</span>
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
											<span class="fa fa-2x">{{\App\Models\Pupil::whereLevel('secondary')->count()}}</span>
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
										<option value="{{$level}}">{{ str_replace("Le", "Les apprenants du ", $name) }}</option>
									@endforeach
								</select>
							</form>
						</div>
						<div class="float-right d-flex justify-content-between pr-2 mt-4 mb-0">
							<p class="h5-title m-0 mr-3">Les premiers respo sont en <span class="text-primary">Bleu</span></p>
							<p class="h5-title m-0">Les seconds respo sont en <span class="text-success">Vert</span></p>
						</div>
					</div>
				<hr class="m-0 mt-1" style="background-color: white">
				</div>

				<div class="container bg-transparent w-100 py-1">
					<div class="w-100" style="min-height: 500px;">
						<div class="w-90 m-0 p-0 mt-2" id="all-tags">
							<table class="table-table table-striped w-100">
								<thead>
									<th>No</th>
									<th>Name</th>
									<th>Sexe</th>
									<th>Naissance</th>
									<th>Inscrit depuis</th>
									<th>Classe</th>
									<th colspan="2">Actions</th>
								</thead>
								<tbody>
									<?php $i = 0; ?>
									@foreach($pupils as $pupil)
									<?php $i++; ?>
										<tr class="border-bottom border-dark">
											<td>
												{{$i}}
											</td>
											<td class="text-left">
												<a class="card-link w-100 d-inline-block {{$pupil->isRespo()}} " href="{{route('pupils.show', $pupil->id)}}">{{$pupil->name}}</a>
												<a href="#" title="card-link Editer les informations de {{ $pupil->name }}" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important"></a> 
											</td>
											<td>
												{{strtoupper(substr($pupil->sexe, 0, 1))}} 
											</td>
											<td>
												{{App\ModelHelper::birthFormattor($pupil)}}
											</td>
											<td>
												{{$pupil->month.' '.$pupil->year}}
											</td>
											<td>
												<a class="card-link w-100 d-inline-block" href="{{route('classes.show', $pupil->classe->id)}}">{{$pupil->classe->getFormattedClasseName()['name']}} <sup>{{$pupil->classe->getFormattedClasseName()['sup']}}</sup> {{$pupil->classe->getFormattedClasseName()['idc']}}
												</a>
											</td>
											
											<td>
												<ul class="navbar-nav ml-auto bg-transparent rounded">
													<li class="nav-item dropdown mr-1">
						                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						                                    {{ __('Faire passer en ') }} <span class="caret"></span>
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
													<button class="btn btn-danger w-100" >Blocké</button>
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
									<th>No</th>
									<th>Name</th>
									<th>Sexe</th>
									<th>Naissance</th>
									<th>Inscrit depuis</th>
									<th>Classe</th>
									<th colspan="2">Actions</th>
								</thead>
								<tbody>
									<?php $i = 0; ?>
									@foreach($primaryPupils as $pupil)
									<?php $i++; ?>
										<tr class="border-bottom border-dark">
											<td>
												{{$i}}
											</td>
											<td class="text-left">
												<a class="card-link w-100 d-inline-block {{$pupil->isRespo()}}" href="{{route('pupils.show', $pupil->id)}}">{{$pupil->name}}</a>
												<a href="#" title="card-link Editer les informations de {{ $pupil->name }}" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important"></a>
											</td>
											<td>
												{{strtoupper(substr($pupil->sexe, 0, 1))}} 
											</td>
											<td>
												{{App\ModelHelper::birthFormattor($pupil)}}
											</td>
											<td>
												{{$pupil->month.' '.$pupil->year}}
											</td>
											<td>
												<a class="card-link w-100 d-inline-block" href="{{route('classes.show', $pupil->classe->id)}}">{{$pupil->classe->getFormattedClasseName()['name']}} <sup>{{$pupil->classe->getFormattedClasseName()['sup']}}</sup> {{$pupil->classe->getFormattedClasseName()['idc']}}
												</a>
											</td>
											
											<td>
												<ul class="navbar-nav ml-auto bg-transparent rounded">
													<li class="nav-item dropdown mr-1">
						                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						                                    {{ __('Faire passer en ') }} <span class="caret"></span>
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
													<button class="btn btn-danger w-100" >Blocké</button>
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
									<th>No</th>
									<th>Name</th>
									<th>Sexe</th>
									<th>Naissance</th>
									<th>Inscrit depuis</th>
									<th>Classe</th>
									<th colspan="2">Actions</th>
								</thead>
								<tbody>
									<?php $i = 0; ?>
									@foreach($secondaryPupils as $pupil)
									<?php $i++; ?>
										<tr class="border-bottom border-dark">
											<td>
												{{$i}}
											</td>
											<td class="text-left">
												<a class="card-link w-100 d-inline-block {{$pupil->isRespo()}}" href="{{route('pupils.show', $pupil->id)}}">{{$pupil->name}}</a>
												<a href="#" title="card-link Editer les informations de {{ $pupil->name }}" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important"></a>
											</td>
											<td>
												{{strtoupper(substr($pupil->sexe, 0, 1))}} 
											</td>
											<td>
												{{App\ModelHelper::birthFormattor($pupil)}}
											</td>
											<td>
												{{$pupil->month.' '.$pupil->year}}
											</td>
											<td>
												<a class="card-link w-100 d-inline-block" href="{{route('classes.show', $pupil->classe->id)}}">{{$pupil->classe->getFormattedClasseName()['name']}} <sup>{{$pupil->classe->getFormattedClasseName()['sup']}}</sup> {{$pupil->classe->getFormattedClasseName()['idc']}}
												</a>
											</td>
											
											<td>
												<ul class="navbar-nav ml-auto bg-transparent rounded">
													<li class="nav-item dropdown mr-1">
						                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						                                    {{ __('Faire passer en ') }} <span class="caret"></span>
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
													<button class="btn btn-danger w-100" >Blocké</button>
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

@endauth