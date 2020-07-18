@auth

@extends('layouts.director')
@section('content')
	<div class="float-right" id="admin-principal-container" style="width: 100%;">
		<div id="pupilsCMP" class="mx-auto py-1 w-100">
			<listing-component-pupils> </listing-component-pupils>
		</div>
	</div>
@endsection

@endauth