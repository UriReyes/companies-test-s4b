@extends('layouts.app')

@section('title')
    | Crear
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Añadir empleado <i class="fas fa-user-circle"></i> </h3>
        <p class="m-0">En esta sección podrás agregar una empleado</p>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            @include('employees._form',['btnText'=>'Guardar'])
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('partials._footer')
@endsection