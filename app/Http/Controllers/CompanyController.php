<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyPostRequest;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
    }

    public function index()
    {
        $companies = Company::with('employees')->get();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $company = new Company;
        return view('companies.create', compact('company'));
    }

    public function store(CompanyPostRequest $request)
    {
        if ($request->validated()) {
            $path_logo = null;
            if ($request->file('logo') !== null) {
                $logo = $request->file('logo')->store('public/logos');
                $path_logo = Storage::url($logo);
            }
            Company::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'logo' => $path_logo,
                'website' => $request->get('website'),
            ]);
        }
        return redirect()->route('companies.index')->with('success', 'Compañía ' . $request->get('name') . ' añadida con éxito');
    }

    public function show(Company $company)
    {
        $company->with('employees')->get();
        $employees = $company->employees()->paginate(10);
        return view('companies.show', compact('company', 'employees'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyPostRequest $request, Company $company)
    {
        if ($request->validated()) {
            $path_logo_old = $company->logo;
            $path_logo = $company->logo;
            if ($request->file('logo') !== null) {
                $logo = $request->file('logo')->store('public/logos');
                $path_logo = Storage::url($logo);
            }
            $company->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'logo' => $path_logo,
                'website' => $request->get('website'),
            ]);

            if (file_exists(public_path() . $path_logo_old)) {
                unlink(public_path() . $path_logo_old);

            }

            return redirect()->route('companies.index')->with('success', 'Compañía ' . $request->get('name') . ' editada con éxito');
        }
    }

    public function destroy(Company $company)
    {
        try {
            $delete = $company->delete();
            if ($delete) {
                return ['success' => "Compañía eliminada con éxito"];
            }
            return ['error' => "Ocurrió un error"];
        } catch (QueryException $e) {
            if ($e->errorInfo[0] == "23000") {
                return ['error' => "Este registro está relacionado con distintas tablas, eliminarlo traería problemas de estabilidad. Asegurese de eliminar todos los registros que hagan referencia a este registro e intente nuevamente."];
            }
        }
    }

}
