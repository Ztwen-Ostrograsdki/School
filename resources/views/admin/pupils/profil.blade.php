@extends('layouts.app')
@section('title') {{"Profil Apprenant $pupil->name"}} @endsection
@section('content')
		@if(session()->has('info'))
			<div class="m-0 p-1 w-75 mx-auto text-center">
				<p class="alert alert-{{session('type')}} w-100">
					{{session('info')}}
				</p>
			</div>
		@endif
	<div class="container-profil m-0 p-0">
		<div id="text-profil-container-opac">
			<h3 class="text-profil-opac mx-auto text-center">
				{{'Profil Apprenant'}}
			</h3>
		</div>
		<div class="row justify-content-between w-100 m-0 p-0">
			<div class="profil-img">
				<div class="d-flex justify-content-between">
					<h3 class="ml-4">{{$pupil->name}}</h3>
				</div>
				<span class="photo" title="Photo de {{$pupil->name}}"><img src="/media/hideface.jpg" alt="Photo de {{$pupil->name }}" width="250"></span>
			</div>
			<div class="profil-school">
				<h3>COMPLEXE SCOLAIRE MON ECOLE</h3>
				<h2 align="center" class="profil-class">{{$pupil->classe->name}}</h2>
			</div>
			<div class="profil-admin">
				<div class="justify-content-center my-0">
					<ul class="btn btn-news d-block list-unstyled p-0 my-0">
						<li class="nav-item dropdown mr-1">
	                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                            {{ __('Consulter les notes') }} <span class="caret"></span>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                            <a class="dropdown-item" href="#">{{ __('Les notes 1er Trimestre') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Les notes 2eme Trimestre') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Les notes 3eme Trimestre') }}</a>
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
	                            <a class="dropdown-item" href="#">{{ __('Comptabilité') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Forum de ...') }}</a>
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
			</div>
		</div>
		<div class="mt-5">
			<div class="d-flex justify-content-between">
				<div class="d-flex justify-content-between"  style="width:63% ;">
					<div class="onetable" style="width:48% ;">
						<h5>Les infos personelles</h5>
						<table class="table-profil ">
							<tr>
								<td>Nom:</td>
								<td> {{$p->getFirstName()}} </td>
							</tr>
							<tr>
								<td>Prénoms:</td>
								<td>{{$p->getSurname()}}</td>
							</tr>
							<tr>
								<td>Date de Naissance:</td>
								<td>{{\App\ModelHelper::birthFormattor($pupil)}}</td>
							</tr>
							<tr>
								<td>Sexe:</td>
								<td>{{$pupil->getSexe()}}</td>
							</tr>
							<tr>
								<td>Classe:</td>
								<td>{{$pupil->classe->name}}</td>
							</tr>
						</table>
					<span>
						<a href=" #" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
					</span>
				</div>
				<div class="onetable" style="width:48% ;">
						<h5>Les infos parentales</h5>
						<table class="table-profil ">

							<tr>
								<td>Père :</td>
								<td>Hubert</td>
							</tr>
							<tr>
								<td>Profession :</td>
								<td>Enseignant</td>
							</tr>
							<tr>
								<td>Mère :</td>
								<td>Germaine</td>
							</tr>
							<tr>
								<td>Profession :</td>
								<td>Enseignant</td>
							</tr>
							<tr>
								<td>Contacts :</td>
								<td>65547585/96857415</td>
							</tr>
							<tr>
								<td>Localité :</td>
								<td>Cotonou</td>
							</tr>
						</table>
						<span>
							<a href="#" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
						</span>
					</div>
				</div>
				<div class="d-flex justify-content-between" style="width: 35%;">
					
					<div class="onetable w-100">
						<h5>Les détails suplémentaires</h5>
						<table class="table-profil ">

							<tr>
								<td>Moyenne 1er Trimestre :</td>
								<td>15</td>
							</tr>
							<tr>
								<td>Moyenne 2eme Trimestre :</td>
								<td>14.55</td>
							</tr>
							<tr>
								<td>Moyenne 3eme Trimestre :</td>
								<td>16.05</td>
							</tr>
							<tr>
								<td>Moyenne Générale :</td>
								<td>15.55</td>
							</tr>
							<tr>
								<td>Observation :</td>
								<td>Bonne</td>
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