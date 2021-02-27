@extends('layouts.app')

@section('title')
    | Editar {{$employee->first_name}}
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Editar empleado <small>({{$employee->first_name}})</small> <i class="fas fa-building"></i> </h3>
        <p class="m-0">En esta sección podrás editar la empleado {{$employee->first_name}}</p>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <form method="POST" action="{{ route('employees.update',$employee) }}">
            @csrf
            @method("PATCH")
            @include('employees._form',['btnText'=>'Actualizar'])
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('partials._footer')
@endsection

@section('js')
    <script src="{{ asset('js/employees/index.js') }}"></script>
@endsection