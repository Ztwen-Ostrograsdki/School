@auth

@extends('layouts.director')
@section('content')
	<div class="float-right" id="admin-principal-container" style="width: 100%;">
		<div class="d-flex flex-column justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-180">
			<div class="d-flex justify-content-around py-1 w-100">
				<div class="d-flex row justify-content-around" style="width: 100%">
					<div class="border py-2 col-lg-5 col-md-12">
						<div class="w-100 d-flex justify-content-between">
							<div class="">
								<h5 class="h5-title">Le Primaire</h5>
							</div>
							<div class="">
								<span class="fa fa-close float-right p-1"></span>
							</div>
						</div>
						<hr class="m-0" style="background-color: white">
						<div class="mt-1 w-100">
							<div class="w-100 d-flex justify-content-between">
								<span class="fa fa-user fa-2x" ></span>
								<span class="fa fa-2x">{{\App\Models\Pupil::whereLevel('primary')->count()}}</span>
							</div>
							<div class="w-100 d-block">
								<span class="w-100 d-flex justify-content-around">
									<span class="m-0 p-0">
										<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
									</span>
									<span class="m-0 p-0">
										<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
									</span>
								</span>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6 col-md-12 border">
						<div class="py-2" id="sup-tag" style="display: none; width: 0; opacity: 0">
							<div class="d-flex justify-content-between tag-container" style="width: 100%">
								<div style="width: 98.5%">
									<div class="d-flex justify-content-between">
										<div class="">
											<h5 class="h5-title">Le Supérieur</h5>
										</div>
										<div class="">
											<span class="fa fa-close float-right p-1"></span>
										</div>
									</div>
									<hr class="m-0" style="background-color: white">
									<div class="mt-1 w-100">
										<div class="w-100 d-flex justify-content-between">
											<span class="fa fa-user fa-2x text-white" ></span>
											<span class="fa fa-2x">700</span>
										</div>
										<div class="w-100 d-block">
											<span class="w-100 d-flex justify-content-around">
												<span class="m-0 p-0">
													<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
												</span>
												<span class="m-0 p-0">
													<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
												</span>
											</span>
										</div>
									</div>
								</div>
								<div class="py-4 float-right ml-3">
									<span class="fa fa-chevron-left float-right" id="chevron-sup" style="font-size: 12px;"></span>
								</div>
							</div>
						</div>
						<div class="py-2" id="sec-tag" style="width: 100%">
							<div class="d-flex justify-content-between tag-container" style="width: 100%">
								<div style="width: 98.5%">
									<div class="d-flex justify-content-between">
										<div class="">
											<h5 class="h5-title">Le Secondaire</h5>
										</div>
										<div class="">
											<span class="fa fa-close float-right p-1"></span>
										</div>
									</div>
									<hr class="m-0" style="background-color: white">
									<div class="mt-1 w-100">
										<div class="w-100 d-flex justify-content-between"> 
											<span class="fa fa-user fa-2x text-white" ></span>
											<span class="fa fa-2x">{{\App\Models\Pupil::whereLevel('secondary')->count()}}</span>
										</div>
										<div class="w-100 d-block">
											<span class="w-100 d-flex justify-content-around">
												<span class="m-0 p-0">
													<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
												</span>
												<span class="m-0 p-0">
													<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
												</span>
											</span>
										</div>
									</div>
								</div>
								<div class="py-4 float-right ml-3">
									<span class="fa fa-chevron-left float-right" id="chevron-sec" style="font-size: 12px;"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<span class="fa fa-chevron-up"></span>
				</div>
			</div>
			<div class="w-100">
				<div class="w-100 my-1 p-1">
					<div class="w-100 d-flex justify-content-between">
						<div class="w-50 m-0">
							<form action="">
								<select id="select-p-level" class="custom-select w-50 bg-transparent text-success border-white">
									<option value=""  >Tous les Cycles</option>
									
								</select>
							</form>
						</div>
						<div class="float-right d-flex justify-content-between pr-2 mt-4 mb-0">
							<p class="h5-title m-0 mr-3">Les premiers respo sont en <span class="text-primary">Bleu</span></p>
							<p class="h5-title m-0">Les seconds respo sont en <span class="text-success">Vert</span></p>
						</div>
					</div>
					<hr class="m-0 mt-1" style="background-color: white">
				</div>
				<div id="textor">
					<listing-component>
					
					</listing-component>
				</div>
			</div>
		</div>
	</div>
@endsection

@endauth