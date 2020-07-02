@extends('layouts.app')
@section('title') L'administration en gestionnaire @endsection
@section('content')
<div class="d-flex justify-content-between w-100">


    
    @section('js')
          <!-- Bootstrap core JavaScript-->
          <script src="{{ asset('js/jquery.min.js') }}" defer></script>
            <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
            <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}" defer></script>
            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
            <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
            <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
            <script src="{{ asset('vendor/chart.js/Chart.js') }}" defer></script>
            <script src="{{ asset('js/demo/chart-area-demo.js') }}" defer></script>
            <script src="{{ asset('js/demo/chart-pie-demo.js') }}" defer></script>
    @endsection
</div>
@endsection