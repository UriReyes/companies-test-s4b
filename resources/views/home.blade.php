@extends('layouts.app')

@section('title')
    | Home
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">
            <i class="fas fa-user"></i>
            Bienvenido usuario <b>{{ auth()->user()->name }}</b>
        </h3>
        <p class="m-0">En esta sección podrás visualizar graficas de las compañías</p>
    </div>
    <div id="containerGraphics" class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-5 col-12">
                <canvas id="companiesBar" width="400" height="400"></canvas>
            </div>
            <div class="col-md-5 col-sm-5 col-12">
                <canvas id="companiesPie" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('footer')
    @include('partials._footer')
@endsection

@section('js')
    <script src="{{ asset('js/home/graphics.js') }}"></script>
@endsection
