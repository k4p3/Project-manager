@extends('adminlte::page')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header">
                Mis proyectos
                <a href="{{route("proyectos.create")}}" class="btn btn-info mb-2 float-right"><i class="fas fa-plus"></i> Nuevo</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Presupuesto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proyectos as $proyecto)
                        <tr>
                            @if($proyecto->estatus_id > 1)
                            <td>{{$proyecto->nombre}}</td>
                            @else
                            <td><a href="{{route("proyectos.show", $proyecto->id)}}" title="Detalles de proyecto">{{$proyecto->nombre}}</a></td>
                            @endif
                            <td>
                                @money($proyecto->presupuesto)
                            </td>
                            <td><span class="badge badge-primary">{{$proyecto->estatus}}</span></td>
                        </tr>
                        @empty
                        <div class="alert alert-light" role="alert">
                            No hay registros para mostrar
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
