@extends('layouts.app')
@section('title') Plannification d'octroi de classes @endsection
@section('content')
	@if(session()->has('info'))
		<div class="m-0 p-1 w-75 mx-auto text-center">
			<p class="alert alert-{{session('type')}} w-100">
				{{session('info')}}
			</p>
		</div>
	@endif

	<div class="w-100 mx-auto">
		<div id="text-subject-container">
			<h3 class="text-subject mx-auto text-center">
				{{$teacher->subject->name}}
			</h3>
		</div>
		<div class="container-profil mt-3 pt-4">
			<h3 class="text-center text-decorator">Plannification des classes de {{$teacher->name}}</h3>
			<div class="w-100 mt-4 mx-auto">
				<div class="w-75 mx-auto mt-3">
					<form method="POST" action="{{route('secondaryTeachers.update.classes', $teacher->id)}}" class="form-group">
					@csrf
					@method('PUT')
						<div class="d-flex justify-content-between">
							<div class="w-20">
								<select name="c1" id="c1" class="custom-select" @if($canHaveAgain > 0) disabled @endif>
									<label for="c1" class="mb-0"> La prémière classe</label>
									<option value="">Aucune classe selectionnée</option>
									@foreach($classes as $classe)
										<option value="{{$classe->id}}" @if($c1 == $classe->id) disabled selected @endif >{{$classe->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20 mx-1">
								<select name="c2" id="c2" class="custom-select" @if($canHaveAgain > 1) disabled @endif>
									<label for="c2" class="mb-0"> La prémière classe</label>
									<option value="">Aucune classe selectionnée</option>
									@foreach($classes as $classe)
										<option value="{{$classe->id}}" @if($c2 == $classe->id) selected @endif>{{$classe->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20">
								<select name="c3" id="c3" class="custom-select" @if($canHaveAgain > 2) disabled @endif>
									<label for="c3" class="mb-0"> La prémière classe</label>
									<option value="">Aucune classe selectionnée</option>
									@foreach($classes as $classe)
										<option value="{{$classe->id}}" @if($c3 == $classe->id) selected @endif>{{$classe->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20 mx-1">
								<select name="c4" id="c4" class="custom-select" @if($canHaveAgain > 3) disabled @endif>
									<label for="c4" class="mb-0"> La prémière classe</label>
									<option value="">Aucune classe selectionnée</option>
									@foreach($classes as $classe)
										<option value="{{$classe->id}}" @if($c4 == $classe->id) selected @endif>{{$classe->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20">
								<select name="c5" id="c5" class="custom-select" @if($canHaveAgain > 4) disabled @endif>
									<label for="c5" class="mb-0"> La prémière classe</label>
									<option value="">Aucune classe selectionnée</option>
									@foreach($classes as $classe)
										<option value="{{$classe->id}}" @if($c5 == $classe->id) selected @endif>{{$classe->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-2 mx-auto w-50">
							<button type="submit" class="btn btn-news w-75">Valider</button>
						</div>
					</form>
				</div>
				<div class="w-100" style="position: relative;top: 300px;">
					<p class="text-center text-danger m-0 p-0 mt-3">
						Vous pouvez choisir au maximun 5 classes* pour ce prof 
					</p>
					<span class="d-block text-center text-danger mt-2 font-italic">
						* Les classes choisies doivent être différentes les unes des autres!
					</span>
				</div>
			</div>
		</div>
	</div>


@endsection
