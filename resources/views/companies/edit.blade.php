@extends('layouts.app')

@section('title')
    | Editar {{$company->name}}
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Editar compañía <small>({{$company->name}})</small> <i class="fas fa-building"></i> </h3>
        <p class="m-0">En esta sección podrás editar la compañía {{$company->name}}</p>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <form method="POST" action="{{ route('companies.update',$company) }}" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            @include('companies._form',['btnText'=>'Actualizar'])
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('partials._footer')
@endsection

@section('js')
    <script src="{{ asset('js/companies/index.js') }}"></script>
@endsection