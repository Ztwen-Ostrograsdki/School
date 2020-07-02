@extends('layouts.app')
@section('title') Profil de la classe de {{$classe->name}} @endsection
@section('content')
		@if(session()->has('info'))
			<div class="m-0 p-0 w-75 mx-auto text-center">
				<p class="m-0 alert alert-{{session('type')}} w-100">
					{{session('info')}}
				</p>
			</div>
		@endif
	<div class="container-profil m-0 p-0">
		<div id="text-profil-container-opac">
			<h3 class="text-profil-opac mx-auto text-center">
				{{'Profil classe'}}
			</h3>
		</div>
		<div class="row justify-content-between w-100 m-0 p-0">
			<div class="" style="width: 15%;">
				
			</div>
			<div class="profil-school">
				<h3>COMPLEXE SCOLAIRE MON ECOLE</h3>
				<h2 align="center" class="profil-class"> {{$classe->name}} </h2>
				<hr>
				<div class="profil-chat mt-2 d-flex justify-content-between mx-auto w-50">
					<span title="Ecrire à sur whatsApp">
						<img src="/media/icons/whatsApp.png" alt="" width="30">
					</span>
					<span class="" title="Ecrire à sur Messenger">
						<img src="/media/icons/messenger.png" alt="" width="30">
					</span>
					<span class="" title="Ecrire à sur Gmail">
						<img src="/media/icons/mail2.png" alt="" width="30">
					</span>
					<span title="Ecrire à sur le forum">
						<img src="/media/icons/chat.png" alt="" width="30">
					</span>
				</div>
				<hr>
			</div>
			<div class="profil-admin">
				<div class="justify-content-center my-0">
					<ul class="btn btn-news d-block list-unstyled p-0 my-0">
						<li class="nav-item dropdown mr-1">
	                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                            {{ __('Cahiers de notes') }} <span class="caret"></span>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                            <a class="dropdown-item" href="#">{{ __('Cahier de notes 1er Trimestre') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Cahier de notes 2eme Trimestre') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Cahier de notes 3eme Trimestre') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Inserer') }}</a>
	                        </div>
	                    </li>
					</ul>
				</div>
				<div class="justify-content-center mt-1">
					<ul class="btn btn-news d-block list-unstyled p-0 my-0">
						<li class="nav-item dropdown mr-1">
	                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                            <span class="mr-2 rotate">
									<img src="/media/icons/menu.ico" alt="" width="30">
								</span>{{ __('Options') }} <span class="caret"></span>
	                        </a>

	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                            <a class="dropdown-item" href="#">{{ __('Emploi de temps') }}</a>
	                            <a class="dropdown-item" href="{{route('classes.lister', $classe->id)}}">{{ __('Gestion des élèves') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Gestion des enseignants') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Forum de ')}}</a>
	                            <a class="dropdown-item" href="#">{{ __('Inserer') }}</a>
	                        </div>
	                    </li>
					</ul>
				</div>
				<div class="justify-content-center mt-1">
					<ul class="btn btn-news d-block list-unstyled p-0 my-0">
						<li class="nav-item dropdown mr-1">
	                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                            <span class="mr-2 rotate">
									<img src="/media/icons/archives.png" alt="" width="30">
								</span>{{ __('Archives') }} <span class="caret"></span>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
	                            <a class="dropdown-item" href="#">{{ __('2019-2020') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('2018-2019') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('2017-2018') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('2016-2017') }}</a>
	                        </div>
	                    </li>
					</ul>
				</div>
				<div class="justify-content-center mt-1">
					<a href="" class="btn btn-news w-100">
						<span class="rotate">
							<img src="/media/icons/mail2.png" alt="" width="15">
						</span>
						Notifications
					</a>
				</div>
			</div>


		</div>
		<div class="mt-5">
			<div class="d-flex justify-content-between">
				<div class="onetable" style="width: 30%;">
					<h5>Les infos personelles</h5>
					<table class="table-profil ">
						<tr>
							<td>Prof Principal:</td>
							<td>
								@if($pp == null) non défini @else
							 	<a href="{{route('teachers.show', $pp->id)}}" class="" style="color: inherit;">{{$pp->name}}</a>
							 	@endif
							</td>
							 	
						</tr>
						<tr>
							<td>Responsable 1:</td>
							<td>
								@if($respo1 == null) non défini @else
							 	<a href="{{route('pupils.show', $respo1->id)}}" class="" style="color: inherit;">{{$respo1->name}}</a>
							 	@endif
							 </td>
						</tr>
						<tr>
							<td>Responsable 2</td>
							<td>
								@if($respo2 == null) non défini @else
							 	<a href="{{route('pupils.show', $respo2->id)}}" class="" style="color: inherit;">{{$respo2->name}}</a>
							 	@endif
							</td>
						</tr>
					</table>
					<span title="Mettre à jour les infos de ">
						<a href="{{route('classes.edit', $classe->id)}}" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
					</span>
				</div>
				<div class="d-flex justify-content-between" style="width: 68%;">
					<div class="onetable teacher-classes" style="width: 60%;">
					
						<h5>
							Les Trois meilleurs élèves de la classe
							
						</h5>
						<div class="m-0 p-0">
							<div class="border w-100 p-1">
								
							</div>
						</div>
						<span>
							<a href="#" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
						</span>
					</div>
					<div class="onetable">
						<h5>Les détails suplémentaires</h5>
							<table class="table-profil ">
								<tr>
									<td>Effectif</td>
									<td> {{$classe->pupils->count() >= 10 ? $classe->pupils->count() : '0'.$classe->pupils->count() }} </td>
								</tr>
								<tr>
									<td>Eff.Garçons</td>
									<td>{{count($males) >= 10 ? count($males) : '0'.count($males)}}</td>
								</tr>
								<tr>
									<td>Eff.Filles</td>
									<td>{{count($females) >= 10 ? count($females) : '0'.count($females)}}</td>
								</tr>
							</table>
						<span>
							<a href="#" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection	