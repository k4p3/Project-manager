@extends('adminlte::page')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$rubro->nombre}}</h1>
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

<section class="mt-2 pt-3 pb-3">
    <div class="box">
        <div class="container">
            <dl class="row">
            <dt class="col-sm-3">Descripción:</dt>
              <dd class="col-sm-9">{{$rubro->descripcion}}</dd>
            </dl>
            <div class="row">
                <div class="col-md-12">

                    <form action="{{ route('rubros.destroy',$rubro->id) }}" method="POST">

                        <a href="{{route("rubros.edit", $rubro->id)}}" class="btn  btn-secondary"><i class="fas fa-edit"></i> Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i> Borrar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop
