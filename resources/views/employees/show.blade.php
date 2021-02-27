@extends('layouts.app')

@section('title')
    | Visualizar {{$employee->first_name}}
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Visualizar empleado <small>({{$employee->first_name}})</small> <i class="fas fa-building"></i> </h3>
        <p class="m-0">En esta sección podrás visualizar información del empleado {{$employee->first_name}}</p>
        <a href={{ route('employees.index') }} 
            class="btn btn-sm btn-danger m-0"> 
            <i class="fas fa-arrow-left"></i> 
            Regresar
        </a>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$employee->first_name}} {{$employee->last_name}}
                            <small>
                                <a href="{{ route('employees.edit', $employee->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </small>
                        </h4>
                        <ul style="list-style: none">
                            <li>
                                <i class="fas fa-at"></i> 
                                <b>Email:</b>
                                {{$employee->email != null ? $employee->email : "Sin email"}}
                            </li>
                            <li>
                                <i class="fas fa-phone"></i> 
                                <b>Teléfono:</b>
                                {{$employee->phone != null ? $employee->phone : "Sin teléfono"}}
                            </li>
                            <li> 
                                <i class="fas {{$employee->gender!=null ? $employee->gender == "M" ? "fa-mars" : "fa-venus" : "fa-user-circle"}} text-center" style="font-size: 1.2em"></i> 
                                <b>Género: </b> 
                                @if ($employee->gender != null)
                                {{$employee->gender == "M" ? "Masculino" : "Femenino"}}
                                @else
                                    Sin género
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        @if ($employee->company != null)
                            <div class="d-flex justify-content-between align-items-center">
                                <div style="flex-basis: calc(15% - 10px);">
                                    @if ($employee->company->logo != null)
                                    <img src="{{$employee->company->logo}}" alt="{{$employee->company->name}}" style="width: 100%"> 
                                    @endif
                                </div>
                                <div style="flex-basis: calc(85% - 10px)">
                                    <b>{{$employee->first_name}}</b> actualmente se encuentra en {{$employee->company->name}}
                                </div>
                            </div> 
                        @else
                            <b>{{$employee->first_name}}</b> aún no se ha asignado a una empresa
                        @endif
                    </div>
                </div>
                <small><b>Empleado registrado: </b>{{$employee->created_at->diffForHumans()}}</small>
                <small><b> Se actualizó: </b> {{  $employee->updated_at != $employee->created_at  ?$employee->updated_at->diffForHumans() : "Sin cambios"}}</small>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('partials._footer')
@endsection

@section('js')
    <script src="{{ asset('js/companies/index.js') }}"></script>
@endsection