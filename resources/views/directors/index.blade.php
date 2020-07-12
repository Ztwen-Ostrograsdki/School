@auth

@extends('layouts.director')

@section('content')
	<div class="float-right" id="admin-principal-container" style="width: 100%;">
		<div class="d-flex justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-50">
			<div class="d-flex row justify-content-around" style="width: 98.5%">
				<div class="border py-2 col-4">
					<div class="w-100 d-flex justify-content-between">
						<div class="">
							<h5 class="h5-title">Enseignants</h5>
						</div>
						<div class="">
							<span class="fa fa-close float-right p-1"></span>
						</div>
					</div>
					<hr class="m-0" style="background-color: white">
					<div class="mt-1 w-100">
						<a href="{{route('teachersm.index')}}" class="w-100 d-flex link-white mt-1 d-flex justify-content-between">
							<span class="fa fa-user fa-2x" ></span>
							<span class="fa fa-2x">{{\App\Models\Teacher::all()->count()}}</span>
						</a>
						<div class="w-100 d-block">
							<span class="w-100 d-flex justify-content-around">
								<span class="m-0 p-0">
									<i class="text-white-50 h5-title ">Primaire:</i> <i class="text-white-50 h5-title ">{{\App\Models\Teacher::whereLevel('primary')->count()}}</i>
								</span>
								<span class="m-0 p-0">
									<i class="text-white-50 h5-title ">Secondaire:</i> <i class="text-white-50 h5-title ">{{\App\Models\Teacher::whereLevel('secondary')->count()}}</i>
								</span>
								<span class="m-0 p-0">
									<i class="text-white-50 h5-title ">Supérieur:</i> <i class="text-white-50 h5-title ">100</i>
								</span>
							</span>
						</div>
					</div>
				</div>
				<div class="border py-2 col-3">
					<div class="w-100 d-flex justify-content-between">
						<div class="">
							<h5 class="h5-title">Personnel administratif</h5>
						</div>
						<div class="">
							<span class="fa fa-close float-right p-1"></span>
						</div>
					</div>
					<hr class="m-0" style="background-color: white">
					<div class="mt-1 d-flex justify-content-between">
						<span class="fa fa-user fa-2x" ></span>
						<span class="fa fa-2x">{{(\App\User::whereRole('admin')->count()) + (\App\User::whereRole('superAdmin')->count())}}</span>
					</div>
				</div>
				<div class="border py-2 col-2">
					<div class="w-100 d-flex justify-content-between">
						<div class="">
							<h5 class="h5-title">Apprenants</h5>
						</div>
						<div class="">
							<span class="fa fa-close float-right p-1"></span>
						</div>
					</div>
					<hr class="m-0" style="background-color: white">
					<a href="{{route('pupilsm.index')}}" class="link-white mt-1 d-flex justify-content-between">
						<span class="fa fa-book fa-2x" ></span>
						<span class="fa fa-2x">{{\App\Models\Pupil::all()->count()}}</span>
					</a>
				</div>
				<div class="col-2 border">
					<div class="py-2" id="users-tag" style="display: none; width: 0; opacity: 0">
						<div class="d-flex justify-content-between tag-container" style="width: 100%">
							<div style="width: 98.5%">
								<div class="d-flex justify-content-between">
									<div class="">
										<h5 class="h5-title">Utilisateurs</h5>
									</div>
									<div class="">
										<span class="fa fa-close float-right p-1"></span>
									</div>
								</div>
								<hr class="m-0" style="background-color: white">
								<a href="{{route('users.index')}}" class="mt-1 link-white d-flex justify-content-between">
									<div>
										<span class="fa fa-user fa-2x text-white" ></span>
									</div>
									<span class="fa fa-2x">{{\App\User::all()->count()}}</span>
								</a>
							</div>
							<div class="py-4 float-right ml-3">
								<span class="fa fa-chevron-left float-right" id="chevron-users" style="font-size: 12px;"></span>
							</div>
						</div>
					</div>
					<div class="py-2" id="parents-tag" style="width: 100%">
						<div class="d-flex justify-content-between tag-container" style="width: 100%">
							<div style="width: 98.5%">
								<div class="d-flex justify-content-between">
									<div class="">
										<h5 class="h5-title">Parents d'élèves</h5>
									</div>
									<div class="">
										<span class="fa fa-close float-right p-1"></span>
									</div>
								</div>
								<hr class="m-0" style="background-color: white">
								<div class="mt-1 d-flex justify-content-between">
									<div>
										<span class="fa fa-baby fa-2x text-white" ></span>
									</div>
									<span class="fa fa-2x">1500</span>
								</div>
							</div>
							<div class="py-4 float-right ml-3">
								<span class="fa fa-chevron-left float-right" id="chevron-parents" style="font-size: 12px;"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<span class="fa fa-chevron-up"></span>
			</div>
			
		</div>
	</div>
@endsection

@endauth