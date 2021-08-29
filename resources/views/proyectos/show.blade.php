@extends('adminlte::page')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$proyecto->nombre}}</h1>
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
    <div class="col-md-8 mt-5">
        <div class="card card-secondary mb-3">
            <div class="card-header">
                {{$proyecto->nombre}}
                <span class="badge badge-primary float-right">{{$proyecto->estatus}}</span>
            </div>
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
                        <dt class="col-sm-3">Presupuesto solicitado:</dt>
                        <dd class="col-sm-9 text-warning">@money($proyecto->presupuesto)</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Presupuesto asignado:</dt>
                        <dd class="col-sm-9 text-success">@money($proyecto->pasignado)</dd>
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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">
                                @can ('proyectos.aprueba.jefearea')
                                    <a href="{{route("proyectos.siguiente", $proyecto->id)}}" class="btn  btn-success"><i class="fas fa-check-circle"></i> Enviar a siguiente nivel</a>
                                @endcan

                                @can('proyectos.aprueba.director')
                                    <a href="{{route("proyectos.autoriza", $proyecto->id)}}" class="btn  btn-success"><i class="fas fa-check-circle"></i> Aprobar</a>
                                    <a href="{{route("proyectos.rechaza", $proyecto->id)}}" class="btn  btn-warning"><i class="fas fa-recycle"></i> Rechazar</a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                <a href="{{route("proyectos.edit", $proyecto->id)}}" class="btn  btn-secondary"><i class="fas fa-edit"></i> Editar</a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i> Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop
