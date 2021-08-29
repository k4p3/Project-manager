@extends('adminlte::page')

{{-- Setup data for datatables --}}
@php
$heads = [
    ['label' => 'ID', 'width' => 4],
    'Nombre',
    ['label' => 'Descripción', 'width' => 40],
    ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
];

@endphp


@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Status</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">Status</li>
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
<a href="{{route("estatus.create")}}" class="btn btn-info mb-2 float-right"><i class="fas fa-plus"></i> Nuevo</a>
{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" striped hoverable compressed>
    @foreach($estatus as $estatu)
        <tr>
            <td>{{$estatu->id}} </td>
            <td> {{$estatu->nombre}}</td>
            <td> {{$estatu->descripcion}}</td>
            <td><form action="{{ route('estatus.destroy',$estatu->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <nobr>
                <a href="{{route("estatus.show", $estatu->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                <a href="{{route("estatus.edit", $estatu->id)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button>
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
