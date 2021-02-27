<p class="text-black-50">Los campos con la leyenda <small class="text-danger" style="font-size: 10px">(Requerido)</small> son obligatorios</p>
<small class="text-bold text-black-50"><i class="fas fa-info-circle"></i> Información de la compañía</small>
<br />
<div class="row mb-4 mt-2">
    <div class="col-md-6 col-sm-6 col-12">
        <label for="name"><i class="fas fa-building text-muted"></i> Nombre 
            <small><b class="text-danger">(Requerido)</b></small>
        </label>
        <input 
            type="text" 
            class="form-control {{$errors->has('name') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="name" 
            placeholder="Nombre de la compañía"
            value="{{old('name',$company->name)}}" 
            id="name" 
            required/>
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <label for="email"><i class="fas fa-at text-muted"></i> Email</label>
        <input type="email" 
            class="form-control {{$errors->has('email') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="email" 
            placeholder="Email de la compañía" 
            value="{{old('email',$company->email)}}" 
            id="email" />
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-12">
        <label for="logo"><i class="fas fa-image text-muted"></i> Logo</label>
        <input type="file" 
            class="form-control {{$errors->has('logo') ? "is-invalid" : ""}}" 
            name="logo" 
            accept="image/png, image/jpeg, image/jpg"
            id="logo" />
        <div class="invalid-feedback">
            {{$errors->first('logo')}}
        </div>
        @if ($company->logo != null)
            <div class="mt-4">
                <span class="badge mb-2">Logo actual de la compañía {{$company->name}} 
                    <button id="toggleLogo" class="btn btn-sm p-0" 
                        data-toggle="tooltip" 
                        title="Mostrar">
                        <i id="iconBtn" class="fas fa-eye"></i>
                    </button>
                </span>
                <img class="img-fluid rounded shadow logo" src="{{$company->logo}}" alt="{{$company->name}}" style="display: none">
            </div>
        @endif
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <label for="website"><i class="fas fa-globe text-muted"></i> Website</label>
        <input type="text" class="form-control {{$errors->has('website') ? "is-invalid" : ""}}" 
            autocomplete="off" 
            name="website"
            placeholder="Website de la compañía" 
            value="{{old('website',$company->website)}}" 
            id="website" />
        <div class="invalid-feedback">
            {{$errors->first('website')}}
        </div>
    </div>
</div>
<br>
<div>
    <a href="{{ route('companies.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Cancelar</a>
    <button class="btn btn-sm btn-success" type="submit">
        <i class="fas fa-save"></i> {{$btnText}}
    </button>
</div>