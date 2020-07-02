@extends('layouts.app')

@section('title') Edition des inforamtions de la classe...@endsection

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
				{{$classe->name}}
			</h3>
		</div>
		<div class="container-profil mt-3 pt-4">
			<h3 class="text-center text-decorator">Edition des inforamtions de la classe {{$classe->name}}</h3>
			<div class="w-100 mt-4 mx-auto">
				<div class="w-75 mx-auto mt-3">
					<form method="post" action="{{route('classes.update', $classe->id)}}" class="form-group form-creator">
					@csrf
					@method('PUT')
						<input type="text" name="id" value="{{$classe->id}}" hidden="">
						<div class="d-flex justify-content-between">
							<div class="w-20 mx-1">
								<label for="name" class="mb-0"> Le nom de la classe</label>
								<input type="text" name="name" id="name" value="{{@old('name', $classe->name)}}" class="form-control @error('name') is-invalid @enderror" placeholder="Veuillez saisir le nom de la classe">
								@error('name')
									<p class="invalid-feedback w-75">{{$message}}</p>
								@enderror
							</div>
							<div class="w-20">
								<label for="pp" class="mb-0">@if($classe->level == 'secondary') Le prof principal @else Le Maître @endif</label>
								<select name="pp" id="pp" class="custom-select">
									@if($classe->level == 'secondary')
									 	<option value="">Aucun prof sélectionné</option>
									@else 
										<option value="">Aucun Maître sélectionné</option>
									@endif
									@foreach($teachers as $teacher)
										<option value="{{$teacher->id}}" @if($teacher->id == $pp) selected="" @endif @if($teacher->classe) disabled @endif>{{$teacher->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20 mx-1">
								<label for="respo1" class="mb-0"> Le premier responsable</label>
								<select name="respo1" id="respo1" class="custom-select">
									<option value="">Choisissez le premier respo</option>
									@foreach($pupils as $pupil)
										<option value="{{$pupil->id}}" @if($respo1 == $pupil->id) selected="" @endif @if($respo2 == $pupil->id) disabled="" @endif>{{$pupil->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20 mx-1">
								<label for="respo2" class="mb-0"> Le second responsable</label>
								<select name="respo2" id="respo2" class="custom-select">
									<option value="">Choisissez le second respo</option>
									@foreach($pupils as $pupil)
										<option value="{{$pupil->id}}" @if($respo2 == $pupil->id) selected="" @endif @if($respo1 == $pupil->id) disabled="" @endif>{{$pupil->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="w-20 mx-1 d-flex justify-content-between">
								<div class="mr-1">
									<label for="month" class="mb-0">Le mois</label>
									<select name="month" id="month" class="custom-select">
										<option value="">Choisissez le mois</option>
										@foreach($months as $m)
											<option value="{{$m}}" @if($m == $month) selected="" @endif>{{$m}}</option>
										@endforeach
									</select>
								</div>
								<div>
									<label for="year" class="mb-0">L'année</label>
									<select name="year" id="year" class="custom-select">
										<option value="">Choisissez l'année</option>
										@for($i = 1990; $i <= date('Y'); $i++)
											<option value="{{$i}}" @if($i == $year) selected="" @endif>{{$i}}</option>
										@endfor
									</select>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-2 mx-auto w-50">
							<button type="submit" class="btn btn-news w-75">Valider</button>
						</div>
					</form>
				</div>
				<div class="w-100" style="position: relative;top: 150px;">
					<p class="text-center text-danger m-0 p-0 mt-3">

					</p>
					<span class="d-block text-center text-danger mt-2 font-italic">
					
					</span>
				</div>
			</div>
		</div>
	</div>


@endsection
