@extends('adminlte::page')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Asignar a: {{$proyecto->nombre}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="row justify-content-center">
    <div class="col-md-6 mt-5">
        <div class="card card-secondary mb-3">
            <div class="card-header">Detalles del proyecto</div>
            <div class="card-body">
                <div class="">
                    <dl class="row">
                        <dt class="col-sm-3">Clave:</dt>
                        <dd class="col-sm-9">{{$proyecto->clave}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Fecha limite:</dt>
                        <dd class="col-sm-9 ">{{date('d/m/Y', strtotime($proyecto->limite))}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Presupuesto:</dt>
                        <dd class="col-sm-9 text-warning">@money($proyecto->presupuesto)</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Area:</dt>
                        <dd class="col-sm-9">{{$proyecto->area}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Descripción:</dt>
                        <dd class="col-sm-9">{{$proyecto->descripcion}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Documento:</dt>
                        <dd class="col-sm-9"><a href="{{$proyecto->documento}}"><i class="fas fa-file-download"></i> Descargar</a></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <div class="card card-success">
          <div class="card-header">
            Presupuesto a asignar
          </div>
          <div class="card-body">
            <h4 class="card-title">Indique el monto de presupuesto a asignar al proyecto</h4>
            <p class="card-text">Esta cantidad de dinero debera ser asignada por personal de Finanzas</p>

            <form action="{{route("proyectos.asigna", $proyecto->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleInputNombre">Presupuesto asignado</label>
                    <input name="pasignado" type="text" class="form-control @error('pasignado') is-invalid @enderror" id="exampleInputNombre" value="{{old('pasignado',$proyecto->pasignado)}}">
                    @error('pasignado')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                    <small id="nombreHelp" class="form-text text-muted">Indica el presupuesto a asignar.</small>
                </div>
                <input type="submit" class="btn btn-primary" value="Asignar" />
            </form>
          </div>
        </div>
    </div>
</section>


@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop
