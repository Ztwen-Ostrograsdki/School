@extends('layouts.app')

@section('content')
		@if(session()->has('info'))
			<div class="m-0 p-1 w-75 mx-auto text-center">
				<p class="alert alert-{{session('type')}} w-100">
					{{session('info')}}
				</p>
			</div>
		@endif
		<hr class="">
		<div class="d-flex w-100 justify-content-between">
			<h5>Gestion des élèves de l'etablissement</h5>
			<a href="{{route('pupils.create')}}" class="btn btn-info mr-3 mb-2">Ajouter un nouvel élève</a>
		</div>
		<hr class="">
		<div class="m-0 py-2 px-1 d-flex justify-content-between border rounded">
			<div class="w-75 d-flex justify-content-between">
				<div class="w-50 m-0">
					<select class="custom-select w-50"  onchange="window.location.href = this.value">
						<option value="{{route('pupils.index')}}" @unless('param') selected="selected" @endunless >Tous les Cycles</option>
						@foreach($levels as $level => $name)
							<option value="{{route('pupils.ByLevel.index', $level)}}" {{$param == $level ? 'selected' : ''}} >{{$name}}</option>
						@endforeach
					</select>
				</div>
				<div class="w-50 m-0">
					<form action="" class="form-group m-0">
						<input type="search" class="form-control bg-transparent" placeholder="Rechercher un élève..." >
					</form>
				</div>
			</div>
			<div class="w-25">
				<select class="custom-select w-75 bg-transparent ml-3"  onchange="window.location.href = this.value">
					<option value="{{route('pupils.index')}}" @unless('param') selected="selected" @endunless >Toutes les classes</option>
					@foreach($classes as $classe)
						<option value="{{route('pupils.ByClasse.index', $classe->id)}}" {{$param == $classe->id ? 'selected' : ''}} >{{$classe->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="m-0 p-0" style="height: 420px; overflow-y: scroll;">
			@if($table !== [])
				<div class="container d-flex justify-content-center">
					<div class="w-90 m-0 p-0 mt-2">
						<table class="table-table table-striped w-100">
							<thead>
								<th>No</th>
								<th>Name</th>
								<th>Sexe</th>
								<th>Naissance</th>
								<th>Actif depuis</th>
								<th>Classe</th>
								<th colspan="3">Actions</th>
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
											<a class="card-link w-100 d-inline-block" href="{{route('pupils.show', $pupil->id)}}">{{$pupil->name}}</a>
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
											<a class="card-link w-100 d-inline-block" href="{{route('classes.show', $pupil->classe->id)}}">{{$pupil->classe->name}}</a>
										</td>
										
										<td>
											<ul class="navbar-nav ml-auto bg-transparent rounded">
												<li class="nav-item dropdown mr-1">
					                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					                                    {{ __('Autoriser') }} <span class="caret"></span>
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
											<form action="" method="post" class="d-inline-block w-100" >
												@csrf
												@method('PUT')
												<button class="btn btn-info w-100" >Notifier</button>
											</form>
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
				@else
					<div class="m-0 p-2 w-100 ">
						<h5 class="alert alert-info text-center">
							Ouupp aucune données
						</h5>
					</div>
				@endif	
			</div>
		</div>
		@section('js')
	        <script src="{{ asset('js/jquery.min.js') }}" defer></script>
		    <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
		    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
		    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
		    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
		    <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
		    <script src="{{ asset('vendor/chart.js/Chart.js') }}" defer></script>
		    <script src="{{ asset('js/demo/chart-area-demo.js') }}" defer></script>
		    <script src="{{ asset('js/demo/chart-pie-demo.js') }}" defer></script>
	    @endsection		
	@endsection
	