@extends('layouts.app')

@section('title')
    | Empleados
@endsection

@section('content')
<div class="container">
    <div class="bg-dark text-white p-4" style="border-radius: 10px 10px 0 0">
        <h3 class="m-0">Empleados <i class="fas fa-users"></i> </h3>
        <p class="m-0">En esta sección podrás visualizar el listado de los empleados dados de alta</p>
    </div>
    <div class="bg-white p-4" style="border-radius: 0 0 10px 10px">
    @include('partials._flashMessages')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-sm btn-success" href={{ route('employees.create') }}>
            <i class="fas fa-plus"></i> Agregar</a>
    </div>
    
    <table class="table" style="width:100%" id="tblEmployees">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Compañía</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Género</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
      
          @foreach ($employees as $employee)
           <tr>
              <td>{{$employee->first_name}} {{$employee->last_name}}</td>
              <td>{{$employee->company != null ? $employee->company->name : "Sin compañía asignada"}}</td>
              <td>{{$employee->email != null ? $employee->email : "Sin email"}}</td>
              <td>{{$employee->phone != null ? $employee->phone : "Sin teléfono"}}</td>
              <td>
                @if ($employee->gender != null)
                    <i class="fas fa-{{$employee->gender == "M" ? "mars" : "venus"}}" style="font-size: 1.5em; color: {{$employee->gender == "F" ? "#ff49f1" : "#0f7aff"}}"></i>
                @else
                    Sin género
                @endif
                </td>
                <td>
                      <a class="text-success" 
                      href={{ route('employees.edit',$employee->id) }} 
                      style="text-decoration: none"
                      data-toggle="tooltip" 
                      title="Editar {{strlen($employee->first_name) <= 10 
                      ? substr($employee->first_name, 0, 10) 
                      : substr($employee->first_name, 0, 10)."..." }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <a class="text-primary"
                      href={{ route('employees.show',$employee->id) }} style="text-decoration:none"
                      data-toggle="tooltip" 
                      title="Visualizar {{strlen($employee->first_name) <= 10 
                      ? substr($employee->first_name, 0, 10) 
                      : substr($employee->first_name, 0, 10)."..." }}">
                      <i class="fas fa-eye"></i>
                  </a>
                  <button class="btn btn-sm p-0 text-danger"
                      onclick="Delete('/employees/{{$employee->id}}');return false;"
                      data-toggle="tooltip" 
                      title="Eliminar {{strlen($employee->first_name) <= 10 
                      ? substr($employee->first_name, 0, 10) 
                      : substr($employee->first_name, 0, 10)."..." }}"
                      >
                      <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>Nombre</th>
            <th>Compañía</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Género</th>
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
    <script src="{{ asset('js/employees/index.js') }}"></script>
@endsection