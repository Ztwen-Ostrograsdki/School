@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center w-100 m-0">
<a href="#" id="register-link-error" class="h4 text-black-50 text-center mx-auto w-100" style="position: relative; z-index: 7; top: 500px; opacity: 1; font-family: cursive;">If you don't receive the modal of registration please click here </a>
    <div class="row  justify-content-center m-0" style="position: absolute; top: 100px">
        <div class="col-md-11">
            <div class="border w-100" style="height: 500px;">
                <img src="{{ asset('media/plage.jpg') }}" alt="une image " style="width: 100%; height: 100%;">                
            </div>
        </div>
    </div>
</div>
@endsection
