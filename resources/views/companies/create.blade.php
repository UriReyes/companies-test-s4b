@extends('layouts.app')

@section('title')
    | Crear
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Añadir compañía <i class="fas fa-building"></i> </h3>
        <p class="m-0">En esta sección podrás agregar una compañía</p>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            @csrf
            @include('companies._form',['btnText'=>'Guardar'])
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('partials._footer')
@endsection