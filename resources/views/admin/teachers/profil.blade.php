@extends('layouts.app')
@section('title') {{'Profil enseignant'}} @endsection
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
				{{'Profil enseignant'}}
			</h3>
		</div>
		<div class="row justify-content-between w-100 m-0 p-0">
			<div class="profil-img">
				<div class="d-flex justify-content-between">
					<h3 class="ml-4">{{$teacher->name}}</h3>
				</div>
				<span class="photo" title="Photo de {{$teacher->name}}"><img src="/media/hideface.jpg" alt="Photo de {{$teacher->name }}" width="250"></span>
			</div>
			<div class="profil-school">
				<h3>COMPLEXE SCOLAIRE MON ECOLE</h3>
				<h2 align="center" class="profil-class">
					@isSecondaryTeacher($teacher) {{$teacher->subject->getSlug()}} @endisSecondaryTeacher
					@isPrimaryTeacher($teacher) 
						@hasClasses($teacher)
							Maître de {{$teacher->classes[0]->name}}
						@endhasClasses
						@hasNotClasses($teacher)
							Maître
						@endhasNotClasses
					 @endisPrimaryTeacher
				</h2>
				<hr>
				<div class="profil-chat mt-2 d-flex justify-content-between mx-auto w-50">
					<span title="Ecrire à {{$teacher->name}} sur whatsApp">
						<img src="/media/icons/whatsApp.png" alt="" width="30">
					</span>
					<span class="" title="Ecrire à {{$teacher->name}} sur Messenger">
						<img src="/media/icons/messenger.png" alt="" width="30">
					</span>
					<span class="" title="Ecrire à {{$teacher->name}} sur Gmail">
						<img src="/media/icons/mail2.png" alt="" width="30">
					</span>
					<span title="Ecrire à {{$teacher->name}} sur le forum">
						<img src="/media/icons/chat.png" alt="" width="30">
					</span>
				</div>
				<hr>
			</div>
			<div class="profil-admin">
				<div class="justify-content-center my-0">
					<ul class="btn btn-news d-block list-unstyled p-0 my-0">
						<li class="nav-item dropdown mr-1">
	                        <a id="navbarDropdownSem" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                            {{ __('Cahiers de notes') }} <span class="caret"></span>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownSem">
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
	                        <a id="navbarDropdownOptions" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                             <span class="mr-2 rotate">
									<img src="/media/icons/menu.ico" alt="" width="30">
								</span>{{ __('Options') }} <span class="caret"></span>
	                        </a>

	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownOptions">
	                            <a class="dropdown-item" href="#">{{ __('Emploi de temps') }}</a>
	                            @isSecondaryTeacher($teacher)
	                            	@admin
	                            	<a class="dropdown-item" href="{{route('secondaryTeacher.manyEdit', ['t' => (int)$teacher->id, 'ind' => 'classe'])}}">{{ __('Gestion des classes') }}</a>
									<a class="dropdown-item" href="#">{{ __('Forum ') .$teacher->subject->getSlug() }}</a>
									@endadmin
	                            @endisSecondaryTeacher
	                            @isPrimaryTeacher($teacher)
									<a class="dropdown-item" href="#">{{ __('Accessibilité classe')}}</a>
									<a class="dropdown-item" href="#">{{ __('Forum des maîtres')}}</a>
									@hasClasses($teacher)
										<a class="dropdown-item" href="{{route('classes.show', $teacher->classes[0]->id)}}">{{ __('Ma/Sa classe')}}</a>
									@endhasClasses	
	                            @endisPrimaryTeacher
	                            <a class="dropdown-item" href="#">{{ __('Comptabilité') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('Inserer') }}</a>
	                        </div>
	                    </li>
					</ul>
				</div>
				<div class="justify-content-center mt-1">
					<ul class="btn btn-news d-block list-unstyled p-0 my-0">
						<li class="nav-item dropdown mr-1">
	                        <a id="navbarDropdownArchives" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                            <span class="mr-2 rotate">
									<img src="/media/icons/archives.png" alt="" width="30">
								</span>{{ __('Archives') }} <span class="caret"></span>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdownArchives">
	                            <a class="dropdown-item" href="#">{{ __('2019-2020') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('2018-2019') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('2017-2018') }}</a>
	                            <a class="dropdown-item" href="#">{{ __('2016-2017') }}</a>
	                        </div>
	                    </li>
					</ul>
				</div>
				<div class="justify-content-center mt-1">
					@selfTeacher($teacher)
					<a href="" class="btn btn-news w-100">
						<span class="rotate">
							<img src="/media/icons/mail2.png" alt="" width="15">
						</span>
						Notifications
					</a>
					@endselfTeacher
				</div>
			</div>


		</div>
		<div class="mt-5">
			<div class="d-flex justify-content-between">
				<div class="onetable" style="width: 30%;">
					<h5>Les infos personelles</h5>
					<table class="table-profil ">
						<tr>
							<td>Nom:</td>
							<td> <?= $t->getFirstName()?> </td>
						</tr>
						<tr>
							<td>Prénoms:</td>
							<td><?= $t->getSurname() ?></td>
						</tr>
						<tr>
							<td>Date de Naissance:</td>
							<td><?= \App\ModelHelper::birthFormattor($teacher) ?></td>
						</tr>
						<tr>
							<td>Contact:</td>
							<td><?= $teacher->contact ?></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><?= $teacher->email?></td>
						</tr>
						<tr>
							<td>Localité:</td>
							<td><?= $teacher->residence ?></td>
						</tr>
					</table>
					<span title="Mettre à jour les infos de {{$teacher->name}}">
					@isSecondaryTeacher($teacher)
						<a href="{{route('secondaryTeacher.manyEdit', ['t' => (int)$teacher->id, 'ind' => 'personal'])}}" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
					@endisSecondaryTeacher
					@isPrimaryTeacher($teacher)
						<a href="{{route('primaryTeacher.edit', $teacher->id)}}" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
					@endisPrimaryTeacher
					</span>
				</div>
				<div class="d-flex justify-content-between" style="width: 68%;">
				@isSecondaryTeacher($teacher)
					<div class="onetable teacher-classes" style="width: 60%;">
					@hasClasses($teacher)
						<h5>
							Les classes tenues
							@admin
							<form method="post" action="{{route('teachers.detach.classes', $teacher->id)}}" class="d-inline m-0 p-0 float-right" onsubmit="return confirm('Voulez-vous vraiment lui retirer toutes les classes?')">
								@csrf
								@method('DELETE')
								<button type="submit" title="rafraichir le liste de classes de {{$teacher->gender(). ' '. $teacher->name}}" class="float-right">
									<img src="/media/icons/recycleall.png" alt="recyclage" width="25" class="float-right">
								</button>
							</form>
							@endadmin
						</h5>
						<div class="m-0 p-0">
							<div class="border w-100 p-1">
								@foreach($teacher->classes as $classe)
									<div class="d-flex mb-1 border-bottom">
										<div class="border-right p-1 text-center" style="width: 40%;">
											<span>
												<a href="{{route('classes.show', $classe->id)}}" class="text-dark text-decoration-none">{{$classe->name}}</a>
											</span>
											@admin
											<div class="d-inline float-right" title="Retirer cette classe de la gestion de ce prof">
												<form method="post" action="{{route('teachers.detach.classe', ['teacher' => $teacher->id, 'classe' => $classe->id])}}" class="d-inline m-0 p-0" onsubmit="return confirm('Voulez-vous vraiment lui retirer cette classe?')">
													@csrf
													@method('DELETE')
													<button type="submit">
														<img src="/media/icons/delete3d.ico" alt="" width="20">
													</button>
												</form>
											</div>
											<span class="float-right" title="Empêcher le prof d'avoir la possiblité de modifier les notes de cette classe" >
												<form action="" class="d-inline m-0 p-0" >
													<button type="submit">
														<img src="/media/icons/security.png" alt="" width="20">
													</button>
												</form>
											</span>
											@endadmin
										</div>
										<div class="text-center" style="width: 55%;">
											<h6 class="m-0 p-0">Lundi 10h - 12h</h6>
											<h6 class="m-0 p-0">Mercredi 10h - 12h</h6>
										</div>
									</div>
								@endforeach	
							</div>
						</div>
						@admin
							<span>
								<a href="{{route('secondaryTeacher.manyEdit', ['t' => (int)$teacher->id, 'ind' => 'classe'])}}" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
							</span>
						@endadmin
					@endhasClasses	
					</div>
					<div class="onetable">
						<h5>Les détails suplémentaires</h5>
						@isPrincipal($teacher)
							<div class="border p-2">
								<p>
									Professeur principal de {{$teacher->classe->name}}
								</p>
							</div>
						@endisPrincipal
					</div>
				@endisSecondaryTeacher	
				</div>
			</div>
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
	    <script src="{{ asset('js/all-index-js.js') }}" defer></script>
    @endsection	
@endsection	