<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeePostRequest;
use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
    }

    public function index()
    {
        $employees = Employee::with('company')->get();
        return view('employees.index', compact("employees"));
    }

    public function create()
    {
        $employee = new Employee;
        $companies = Company::all();
        return view('employees.create', compact('employee', 'companies'));
    }

    public function store(EmployeePostRequest $request)
    {
        if ($request->validated()) {
            Employee::create($request->all());
        }
        return redirect()->route('employees.index')->with('success', 'Empleado ' . $request->get('first_name') . ' ' . $request->get('last_name') . ' ha sido registrado con éxito');
    }

    public function show(Employee $employee)
    {
        $employee->with('company')->get();
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeePostRequest $request, Employee $employee)
    {
        if ($request->validated()) {
            $employee->update($request->all());
        }
        return redirect()->route('employees.index')->with('success', 'Empleado ' . $request->get('first_name') . ' ' . $request->get('last_name') . ' ha sido actualizado con éxito');
    }

    public function destroy(Employee $employee)
    {
        try {
            $delete = $employee->delete();
            if ($delete) {
                return ['success' => "Empleado eliminado con éxito"];
            }
            return ['error' => "Ocurrió un error"];
        } catch (QueryException $e) {
            if ($e->errorInfo[0] == "23000") {
                return ['error' => "Este registro está relacionado con distintas tablas, eliminarlo traería problemas de estabilidad. Asegurese de eliminar todos los registros que hagan referencia a este registro e intente nuevamente."];
            }
        }
    }
}
