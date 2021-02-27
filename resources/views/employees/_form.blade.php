<p class="text-black-50">Los campos con la leyenda <small class="text-danger" style="font-size: 10px">(Requerido)</small> son obligatorios</p>
<small class="text-bold text-black-50"><i class="fas fa-info-circle"></i> Información del empleado</small>
<br />
<div class="row mb-4 mt-2">
    <div class="col-md-6 col-sm-6 col-12">
        <label for="first_name"><i class="fas fa-user-circle text-muted"></i> Nombre(s)
            <small><b class="text-danger">(Requerido)</b></small>
        </label>
        <input 
            type="text" 
            class="form-control {{$errors->has('first_name') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="first_name" 
            placeholder="Nombre(s) del empleado"
            value="{{old('first_name',$employee->first_name)}}" 
            id="first_name"
            required
            />
        <div class="invalid-feedback">
            {{$errors->first('first_name')}}
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <label for="last_name"><i class="fas fa-user-circle text-muted"></i> Apellidos
            <small><b class="text-danger">(Requerido)</b></small>
        </label>
        <input type="text" 
            class="form-control {{$errors->has('last_name') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="last_name" 
            placeholder="Apellidos del empleado" 
            value="{{old('last_name',$employee->last_name)}}" 
            id="last_name"
            required />
        <div class="invalid-feedback">
            {{$errors->first('last_name')}}
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6 col-sm-6 col-12">
        <label for="email"><i class="fas fa-at text-muted"></i> Email
        </label>
        <input type="email" 
            class="form-control {{$errors->has('email') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="email" 
            placeholder="Email del empleado" 
            value="{{old('email',$employee->email)}}" 
            id="email" />
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <label for="phone"><i class="fas fa-phone text-muted"></i> Teléfono</label>
        <input type="tel" class="form-control {{$errors->has('phone') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="phone"
            placeholder="Teléfono del empleado" 
            value="{{old('phone',$employee->phone)}}" 
            id="phone" />
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-12">
        <label for="company_id"><i class="fas fa-user-circle text-muted"></i> Empresa</label>
        <select name="company_id" id="company_id"
            class="custom-select {{$errors->has('company_id') ? "is-invalid" : ""}}">
            <option value="" disabled="disabled" selected>--- Selecciona una compañía---</option>
            @foreach ($companies as $company)
                <option value="{{$company->id}}"
                    {{old('company_id',$employee->company_id) == $company->id ? "selected": ""}}>
                    {{$company->name}}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{$errors->first('company_id')}}
        </div>
        <small><i class="fas fa-info-circle"></i> ¿Aún no se han registrado compañías?
            <a href="{{ route('companies.create') }}" >Registrar</a>
        </small>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <label for="gender"><i class="fas fa-user-circle text-muted"></i> Género</label>
        <select name="gender" id="gender"
            class="custom-select {{$errors->has('gender') ? "is-invalid" : ""}}">
            <option value="" disabled="disabled" selected>--- Selecciona un género---</option>
            <option value="M"
                {{old('gender',$employee->gender) == "M" ? "selected": ""}}
                >Masculino</option>
            <option value="F"
                {{old('gender',$employee->gender) == "F" ? "selected": ""}}
                >Femenino</option>
        </select>
        <div class="invalid-feedback">
            {{$errors->first('gender')}}
        </div>
    </div>
</div>
<br>
<div>
    <a href="{{ route('employees.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Cancelar</a>
    <button class="btn btn-sm btn-success" type="submit">
        <i class="fas fa-save"></i> {{$btnText}}
    </button>
</div>