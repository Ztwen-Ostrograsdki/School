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