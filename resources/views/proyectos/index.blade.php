@extends('adminlte::page')




{{-- Setup data for datatables --}}
@php
$heads = [
    'Clave',
    ['label' => 'Nombre', 'width' => 20],
    'Fecha limite',
    'Presupuesto',
    'Area',
    'Usuario',
    ['label' => 'Descripción', 'width' => 30],
    'Estatus',
    ''
];
@endphp


@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Proyectos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">Proyectos</li>
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

@if ($message = Session::get('info'))
       <div class="alert alert-info">
           <p>{{ $message }}</p>
       </div>
@endif
<section class="box">
    @can ('proyectos.create')
        <a href="{{route("proyectos.create")}}" class="btn btn-info mb-2 float-right"><i class="fas fa-plus"></i> Nuevo</a>
    @endcan

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" striped hoverable>
    @foreach($proyectos as $proyecto)
        <tr>
            <td> {{$proyecto->clave}}</td>
            <td> {{$proyecto->nombre}}</td>
            <td> {{date('d/m/Y', strtotime($proyecto->limite))}}</td>
            <td> {{$proyecto->presupuesto}}</td>
            <td> {{$proyecto->area}}</td>
            <td> {{$proyecto->usuario}}</td>
            <td> {{$proyecto->descripcion}}</td>
            <td> <span class="badge badge-primary">{{$proyecto->estatus}}</span></td>
            <td><form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <nobr>
                <a href="{{route("proyectos.show", $proyecto->id)}}" class="btn btn-xs btn-default text-teal mx-1" title="Details"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                @can ('proyectos.edit')<a href="{{route("proyectos.edit", $proyecto->id)}}" class="btn btn-xs btn-default text-primary mx-1" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></a> @endcan
                @can ('proyectos.delete')<button type="submit" class="btn btn-xs btn-default text-danger mx-1" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button> @endcan
                </nobr>
                </form>
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop
