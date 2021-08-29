@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card card-warning">
                <h5 class="card-header">Editar proyecto</h5>

                <div class="card-body">
                    <form action="{{route("proyectos.update", $proyecto->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputNombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="exampleInputNombre" value="{{old('nombre',$proyecto->nombre)}}" />
                            @error('nombre')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica el nombre del area.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputClave">Clave</label>
                            <input name="clave" type="number" class="form-control @error('clave') is-invalid @enderror" id="exampleInputClave" value="{{old('clave',$proyecto->clave)}}" />
                            @error('clave')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica la clave.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescripcion">Descripción</label>
                            <textarea name="descripcion" rows="5" class="form-control @error('descripcion') is-invalid @enderror" id="exampleInputDescripcion">{{old('descripcion',$proyecto->descripcion)}}</textarea>
                            @error('descripcion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="descripcionHelp" class="form-text text-muted">Indica la descripción de la area.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLimite">Fecha Limite</label>
                            <input name="limite" type="date" class="form-control @error('limite') is-invalid @enderror" id="exampleInputLimite" value="{{old('limite',$proyecto->limite)}}" />
                            @error('limite')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica la fecha limite.</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPresupuesto">Presupuesto solicitado</label>
                                <input name="presupuesto" type="text" class="form-control @error('presupuesto') is-invalid @enderror" value="{{old('presupuesto',$proyecto->presupuesto)}}">
                                @error('presupuesto')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Area</label>
                            <select name="area" class="form-control custom-select my-1 mr-sm-2 @error('area') is-invalid @enderror" id="inlineFormCustomSelectPref" required>
                                <option selected>Selecciona una area</option>
                                @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                                @endforeach
                            </select>
                            @error('area')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
