@extends('layouts.app')
@section('title') Insertion d'un nouvel enseignant du {{$levelName}} @endsection
@section('content')
	@if(session()->has('info'))
		<div class="m-0 p-1 w-75 mx-auto text-center">
			<p class="alert alert-{{session('type')}} w-100">
				{{session('info')}}
			</p>
		</div>
	@endif
	<div id="text-subject-container">
		<h3 class="text-subject mx-auto text-center" style="font-size: 0.7em; position: relative; top: 500px;">
			{{"Création d'un nouvel enseignant"}}
		</h3>
	</div>
	<div class="w-100 mx-auto">
		
		<div class="container-profil mt-3 pt-2">
			<h3 class="text-center text-decorator">Insertion d'un nouvel enseignant du {{$levelName}} </h3>
			<div class="mx-auto my-1 d-flex justify-content-center w-75 border pt-4">
				<form action="@if($level == 'secondary') {{route('secondaryTeacher.store')}} @elseif($level == 'primary') {{route('primaryTeacher.store')}} @endif" method="post" class="form-group w-100 form-creator">
				@csrf
				@method('post')
					<div class="w-100 mx-auto">
						<input type="text" name="level" value="{{$level}}" hidden="">
						<div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
							@isSecondary($level)
								<div class="mx-auto" style="width: 64%">
									<label for="name" class="m-0 p-0">Nom et Prénoms de l'enseignant</label>
									<input type="text" name="name" value="{{@old('name')}}" class="m-0 p-0 form-control p-1 @error('name') is-invalid @enderror" id="name" placeholder="Veuillez renseigner les nom et prenoms">
									@error('name')
										<p class="invalid-feedback m-0 p-0 w-75">
											{{$message}}
										</p>
									@enderror
								</div>
								<div style="width: 34%;" class="">
									<label for="subject_id" class="m-0 p-0">Spécialité</label>
									<select name="subject_id" id="subject_id" class="custom-select">
										<option value="">Choisir la spécialité</option>
										@foreach($subjects as $subject)
											<option value="{{$subject->id}}">{{$subject->name}}</option>
										@endforeach
									</select>
								</div>
							@endisSecondary
							@isPrimary($level)
								<div class="mx-auto" style="width: 64%">
									<label for="name" class="m-0 p-0">Nom et Prénoms de l'enseignant</label>
									<input type="text" name="name" value="{{@old('name')}}" class="m-0 p-0 form-control p-1 @error('name') is-invalid @enderror" id="name" placeholder="Veuillez renseigner les nom et prenoms">
									@error('name')
										<p class="invalid-feedback m-0 p-0 w-75">
											{{$message}}
										</p>
									@enderror
								</div>
								<div style="width: 34%;" class="">
									<label for="classe" class="m-0 p-0">Classe</label>
									<select name="classe" id="classe" class="custom-select @error('classe') is-invalid @enderror">
										<option value="">Choisir la classe</option>
										@foreach($classes as $c)
											<option value="{{$c->id}}" @if($c->teachers->toArray() !== []) disabled="" @endif >{{$c->name}}</option>
										@endforeach
									</select>
									@error('classe')
										<p class="invalid-feedback m-0 p-0 w-75">
											{{$message}}
										</p>
									@enderror
								</div>
							@endisPrimary
						</div>

						<div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
							<div class="mx-auto" style="width: 48.8%;">
								<label for="email" class="m-0 p-0">E-mail de l'enseignant</label>
								<input type="email" value="{{@old('email')}}" class="m-0 p-0 form-control p-1 @error('email') is-invalid @enderror " name="email" id="email" placeholder="Veuillez renseigner l'addresse mail">
								@error('email')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
							<div class="mx-auto" style="width: 48.8%;">
								<label for="birth" class="m-0 p-0">Date de naissance de l'enseignant</label>
								<input type="date" value="{{@old('birth')}}" class="m-0 p-0 form-control p-1 @error('birth') is-invalid @enderror " name="birth" id="birth" placeholder="Veuillez renseigner la date de naissance">
								@error('birth')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
						</div>
						<div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
							<div class="mx-auto" style="width: 48.8%;">
								<label for="contact" class="m-0 p-0">Contacts de l'enseignant</label>
								<input type="text" value="{{@old('contact')}}" class="m-0 p-0 form-control p-1 @error('contact') is-invalid @enderror " name="contact" id="contact" placeholder="Veuillez renseigner les contacts les séparer avec un '/'">
								@error('contact')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
							<div class="mx-auto" style="width: 48.8%;">
								<label for="residence" class="m-0 p-0">Résidence de l'enseignant</label>
								<input type="text" value="{{@old('residence')}}" class="m-0 p-0 form-control p-1 @error('residence') is-invalid @enderror" name="residence" id="residence" placeholder="Veuillez renseigner la résidence exemple 'Porto-Novo'">
								@error('residence')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
						</div>
						<div class=" mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
							<div style="width: 31%;" class="">
								<label for="sexe" class="m-0 p-0">Sexe</label>
								<select name="sexe" id="sexe" class="custom-select @error('sexe') is-invalid @enderror">
									<option value="">Choisir le sexe</option>
									<option value="male">Masculin</option>
									<option value="female">Féminin</option>
								</select>
								@error('sexe')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
							
							<div style="width: 31%;">
								<label for="month" class="m-0 p-0">Le mois d'inscription</label>
								<select name="month" id="month" class="custom-select @error('month') is-invalid @enderror">
									<option value="">Choisissez le mois</option>
									@foreach($months as $m => $value)
										<option value="{{$value}}" @if($m == date('m') -1 )  selected="" @endif>{{$value}}</option>
									@endforeach
								</select>
								@error('month')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
							<div style="width: 31%;">
								<label for="year" class="mb-0">L'année d'inscription</label>
								<select name="year" id="year" class="custom-select @error('year') is-invalid @enderror">
									<option value="">Choisissez l'année</option>
									@for($i = 1990; $i <= date('Y'); $i++)
										<option value="{{$i}}" @if($i == date('Y')) selected="" @endif>{{$i}}</option>
									@endfor
								</select>
								@error('year')
									<p class="invalid-feedback m-0 p-0 w-75">
										{{$message}}
									</p>
								@enderror
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-center w-50 mx-auto py-1 mt-2">
						<button class="btn btn-news w-50" type="submit">Inserer Maintenant</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
@endsection
