@extends('adminlte::page')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header">Proyectos por revisar</div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header">Todos los proyectos</div>
            <div class="card-body">
                @if(!@isset($proyectos))
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Presupuesto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($proyectos as $proyecto)
                            <td><a href="{{route("proyectos.show", $proyecto->id)}}" title="Detalles de proyecto">{{$proyecto->nombre}}</a></td>
                            <td>
                                <blade money($proyecto->presupuesto)
                            </td>
                            <td></td>
                            @endforeach
                        </tr>
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


@push('js')
<script>
    $(document).ready(function() {

        let iBox = new _AdminLTE_InfoBox('ibUpdatable');

        let updateIBox = () => {
            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let progress = Math.round(rep * 100 / 1000);
            let text = rep + '/1000';
            let icon = 'fas fa-lg fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
            let description = progress + '% reputation completed to reach next level';

            let data = {
                text,
                icon,
                description,
                progress
            };
            iBox.update(data);
        };

        setInterval(updateIBox, 5000);
    })
</script>
@endpush
