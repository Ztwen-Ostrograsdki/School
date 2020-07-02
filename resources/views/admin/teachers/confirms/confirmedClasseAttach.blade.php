@extends('layouts.app')

@section('title') Confirmation d'octroi de classes @endsection
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
		<div class="container-profil mt-2 pt-2">
			<h3 class="text-center text-decorator">Procédure de confirmation d'octroi de classes {{$teacher->gender()}} {{$teacher->name}}</h3>
			<p class="text-center text-decorator font-italic">
				Vous avez lancé une procedure de defnition de classes pour {{$teacher->gender()}} {{$teacher->name}} professeur de {{$teacher->subject->name}} <br> Mais lors du processus nous avons constaté que les classes qui suivent ont déjà toute un enseignant en {{$teacher->subject->name}} <br>
				Veuillez cependant cocher les classes que vous souhaitez vraiment les confier à {{$teacher->gender()}} {{$teacher->name}} <br>
				Vous pouvez cliquer TOUT pour valider toutes les classes ou cliquer ANNULER pour avorter le processus
			</p>

			<div class="w-100 mt-4 mx-auto">
				<div class="w-75 mx-auto mt-3">
					<form method="POST" action="{{route('teachers.confirm.classes', $teacher->id)}}" class="form-group w-100 mx-auto">
					@csrf
					@method('PUT')
						<div class="d-flex justify-content-center w-100 mx-auto border rounded py-2">
						<?php $i = 0; foreach($classes as $classe) { $i++;?>

							<div class=" d-flex btn-group-vertical" style="width: 15%;">
								<h5 class="text-center d-inline-block w-100 my-1 .indicator-class-confirm">		{{$classe->name}}
								</h5>
								<div class="w-100 m-0 p-0">
									<span class="d-block mx-auto w-100 text-center">
										<input id="{{$classe->id}}-yes" class="custom-radio class-confirm-yes" type="radio" name="c{{$i}}" value="yes-{{$classe->id}}-{{$classe->teacherOf($teacher->subject->id)->id}}">
										<label for="{{$classe->id}}-yes">Autorisée</label>
									</span>
									<span class="d-block mx-auto w-100 text-center">
										<input id="{{$classe->id}}-no" class="custom-radio class-confirm-no" type="radio" name="c{{$i}}" value="no-{{$classe->id}}">
										<label for="{{$classe->id}}-no">Réfusée</label>
									</span>
								</div>
								<p class="text-center mx-auto w-100 font-italic">
									<a class="" href="{{route('teachers.show', $classe->teacherOf($teacher->subject->id)->id)}}" style="color: rgb(230, 230, 230);">
										{{($classe->teacherOf($teacher->subject->id))->name}}
									</a>
								</p>
							</div>
						<?php } ?>		
						</div>
						<span hidden="" style="display: none;"><input type="text" name="total" value="{{$i}}"></span>
						<div class="mx-auto w-50 d-flex justify-content-between mt-1">
							<button type="submit" class=" btn btn-news text-white" style="width: 49%;">Confirmer</button>
							<button type="submit" class=" btn btn-news text-danger" style="width: 49%;">Annuler</button>
						</div>	
					</form>
				</div>
				<div class="w-100" style="position: relative;top: 70px;">
					<p class="text-center text-danger m-0 p-0 mt-3 w-100">
						Nous vous rappellons que l'actuel prof** de chaque classe* n'aura plus accès à ladite classe en ce qui concerne la gestion des notes et le profil de la classe sur la plateforme 
					</p>
					<span class="d-block text-center text-danger mt-2 font-italic">
						* Les classes dont les cases ont été approuvées! <br>
						** Le nom précisé en bas de chaque classe est celui du prof actuel de ladite classe.
					</span>
				</div>
			</div>
		</div>
	</div>


@endsection
