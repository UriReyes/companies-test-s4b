@extends('layouts.app')

@section('title')
    | Visualizar {{$company->name}}
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Visualizar compañía <small>({{$company->name}})</small> <i class="fas fa-building"></i> </h3>
        <p class="m-0">En esta sección podrás visualizar información de la compañía {{$company->name}}</p>
        <a href={{ route('companies.index') }} 
            class="btn btn-sm btn-danger m-0"> 
            <i class="fas fa-arrow-left"></i> 
            Regresar
        </a>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-12">
                <div class="card">
                    @if ($company->logo != null)
                        <img src={{$company->logo}} class="card-img-top p-3" alt={{$company->name}}>
                    @else
                        <div class="alert alert-danger">Sin logo</div>
                    @endif
                    <div class="card-body">
                        <hr />
                        <h4 class="card-title">{{$company->name}}</h4>
                        <ul style="list-style: none">
                            <li>
                                <i class="fas fa-at"></i> 
                                <b>Email:</b>
                                {{$company->email != null ? $company->email : "Sin email"}}
                            </li>
                            <li>
                                <i class="fas fa-globe"></i> 
                                <b>Website:</b>
                                {{$company->website != null ? $company->website : "Sin website"}}
                            </li>
                        </ul>
                    </div>
                </div>
                <small><b>Compañía registrada: </b>{{$company->created_at->diffForHumans()}}</small>
                <small><b> Se actualizó: </b> {{  $company->updated_at != $company->created_at  ?$company->updated_at->diffForHumans() : "Sin cambios"}}</small>
            </div>
            <div class="col-sm-6 col-md-6 col-12">
                <p class="text-muted">
                    <i class="fas fa-info-circle"></i> Empleados en la empresa
                </p>
                <table class="table" style="width:100%">
                    <thead>
                        <th>Nombre</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>
                                    <i class="fas fa-{{$employee->gender == "M"? "mars" : "venus"}}"></i>
                                    {{$employee->first_name}} {{$employee->last_name}}
                                </td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            
                        @empty
                            <td class="text-center" style="width: 100%">
                                Sin empleados registrados
                            </td>
                        @endforelse
                        
                    </tbody>
                    <tfoot>
                        <th>Nombre</th>
                        <th></th>
                    </tfoot>
                    
                </table>
                {{ $employees->links("pagination::bootstrap-4") }}
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