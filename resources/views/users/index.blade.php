@extends('adminlte::page')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="box">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Rol</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
         @foreach ($users as $user)
             <tr>
               <th scope="row">{{$user->id}}</th>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td></td>
               <td><a href="{{route("usuarios.edit",$user->id)}}" class="btn btn-secondary">Editar</a></td>
             </tr>
        @endforeach
      </tbody>
    </table>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop
