@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <h5 class="card-header">Crear nueva rubro</h5>

                <div class="card-body">
                    <form action="{{route("rubros.index")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="exampleInputNombre" value="{{old('nombre')}}" />
                            @error('nombre')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica el nombre del rubro.</small>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescripcion">Descripción</label>
                            <textrubro name="descripcion" rows="5" class="form-control" id="exampleInputNombre">{{old('descripcion')}}</textrubro>
                            <small id="descripcionHelp" class="form-text text-muted">Indica la descripción de la rubro.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
