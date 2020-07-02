@extends('layouts.app')
@section('title') {{"Liste des élèves de $classe->name"}} @endsection
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
			<h5>Gestion des élèves de la classe de {{$classe->name}} </h5>
			<a href="#" class="btn btn-info mr-3 mb-2">Ajouter un nouvel élève</a>
		</div>
		
		<hr class="">
		<div class="m-0 py-2 px-1 d-flex justify-content-between border rounded">
			<div class="w-75 d-flex justify-content-between">
				<div class="w-50 m-0">
					<select class="custom-select w-50"  onchange="window.location.href = this.value">
						<option value="">Tous les Cycles</option>
						
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
					<option value="" >Toutes les classes</option>
					
				</select>
			</div>
		</div>
		<div class="m-0 p-0" style="height: 420px; overflow-y: scroll;">
				<div class="container d-flex justify-content-center">
					<div class="w-90 m-0 p-0 mt-2">
						<table class="table-table table-striped w-100">
							<thead>
								<th>No</th>
								<th>Name</th>
								@foreach($subjects as $subject)
									<th>{{$subject->code()}}</th>
								@endforeach
							</thead>
							<tbody>
								<?php $j = 0; ?>
								@foreach($pupils as $pupil)
								<?php $j++; ?>
									<tr class="border-bottom border-dark">
										<td class="py-1">
											{{$j}}
										</td>
										<td class="text-left">
											<a class="card-link" href="{{route('pupils.show', $pupil->id)}}">
												{{$pupil->name}}
											</a>
										</td>
										@for($i = 0; $i < count($subjects); $i++)
											<td>-</td>
										@endfor
									</tr>
								@endforeach	
							</tbody>
							
						</table>
						<footer class=" mt-1">
							
						</footer>
					</div>
			</div>
		</div>	
	@endsection
	