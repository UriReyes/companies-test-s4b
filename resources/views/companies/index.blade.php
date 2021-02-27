@extends('layouts.app')

@section('title')
    | Compañías
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Compañías <i class="fas fa-building"></i> </h3>
        <p class="m-0">En esta sección podrás visualizar el listado de las compañías dadas de alta</p>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
    @include('partials._flashMessages')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-sm btn-success" href={{ route('companies.create') }}>
            <i class="fas fa-plus"></i> Agregar</a>
    </div>
    <table class="table" style="width:100%" id="tblCompanies">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email != null ? $company->email : "Sin email"}}</td>
                    <td>
                        @if ($company->logo != null)
                            <img class="img-fluid rounded shadow" src="{{$company->logo}}" alt="{{$company->name}}" style="height: 30px; width: 50px;" />
                        @else
                            Sin logo
                        @endif
                       
                    </td>
                    <td>{{$company->website != null ? $company->website : "Sin website"}}</td>
                    <td>
                        <a class="text-success" 
                            href={{ route('companies.edit',$company->id) }} 
                            style="text-decoration: none"
                            data-toggle="tooltip" 
                            title="Editar {{strlen($company->name) <= 10 
                            ? substr($company->name, 0, 10) 
                            : substr($company->name, 0, 10)."..." }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="text-primary"
                            href={{ route('companies.show',$company->id) }}                                              style="text-decoration:none"
                            data-toggle="tooltip" 
                            title="Visualizar {{strlen($company->name) <= 10 
                            ? substr($company->name, 0, 10) 
                            : substr($company->name, 0, 10)."..." }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button class="btn btn-sm p-0 text-danger"
                            onclick="Delete('/companies/{{$company->id}}');return false;"
                            data-toggle="tooltip" 
                            title="Eliminar {{strlen($company->name) <= 10 
                            ? substr($company->name, 0, 10) 
                            : substr($company->name, 0, 10)."..." }}"
                            >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <div class="badge badge-primary text-white p-2"
                            data-toggle="tooltip"
                            title="{{sizeof($company->employees)}} {{sizeof($company->employees) == 1 ? "empleado" : "empleados" }}">
                            <i class="fas fa-users"></i>
                            {{sizeof($company->employees)}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>Nombre</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th></th>
        </tfoot>
      </table>
    </div>
</div>
@endsection
@section('footer')
    @include('partials._footer')
@endsection
@section('js')
    <script src="{{ asset('js/companies/index.js') }}"></script>
@endsection