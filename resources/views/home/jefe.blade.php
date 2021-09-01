@extends('adminlte::page')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header">Proyectos por revisar</div>
            <div class="card-body">
                @if(@isset($proyectos_por))
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Presupuesto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyectos_por as $proyecto)
                        <tr>
                            <td><a href="{{route("proyectos.show", $proyecto->id)}}" title="Detalles de proyecto">{{$proyecto->nombre}}</a></td>
                            <td>
                                @money($proyecto->presupuesto)
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-light" role="alert">
                    No hay registros para mostrar
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header">Proyectos aprobados</div>
            <div class="card-body">
                @if(@isset($proyectos_apro))
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Presupuesto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($proyectos_apro as $proyecto)
                            <tr>
                                <td>{{$proyecto->nombre}}</td>
                                <td>
                                    @money($proyecto->presupuesto)
                                </td>
                                <td><span class="badge badge-primary">{{$proyecto->estatus}}</span></td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-light" role="alert">
                    No hay registros para mostrar
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
