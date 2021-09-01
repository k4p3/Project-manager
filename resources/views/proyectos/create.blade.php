@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card card-primary">
                <h5 class="card-header">Crear nuevo proyecto</h5>

                <div class="card-body">
                    <form action="{{route("proyectos.index")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="exampleInputNombre" value="{{old('nombre')}}" />
                            @error('nombre')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica el nombre del area.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputClave">Clave</label>
                            <input name="clave" type="number" class="form-control @error('clave') is-invalid @enderror" id="exampleInputClave" value="{{old('clave')}}" />
                            @error('clave')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica la clave.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescripcion">Descripción</label>
                            <textarea name="descripcion" rows="5" class="form-control @error('descripcion') is-invalid @enderror" id="exampleInputDescripcion">{{old('descripcion')}}</textarea>
                            @error('descripcion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="descripcionHelp" class="form-text text-muted">Indica la descripción de la area.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLimite">Fecha Limite</label>
                            <input name="limite" type="date" class="form-control @error('limite') is-invalid @enderror" id="exampleInputLimite" value="{{old('limite')}}" />
                            @error('limite')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="nombreHelp" class="form-text text-muted">Indica la fecha limite.</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPresupuesto">Presupuesto solicitado</label>
                                <input name="presupuesto" type="text" class="form-control @error('presupuesto') is-invalid @enderror" value="{{old('presupuesto')}}">
                                @error('presupuesto')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Area</label>
                            <select name="area" class="form-control custom-select my-1 mr-sm-2 @error('area') is-invalid @enderror" id="inlineFormCustomSelectPref" required>
                                <option selected>Selecciona una area</option>
                                @foreach ($areas as $area)
                                <option value="{{$area->id}}">{{$area->nombre}}</option>
                                @endforeach
                            </select>
                            @error('area')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Rubro</label>
                            <select name="rubro" class="form-control custom-select my-1 mr-sm-2 @error('rubro') is-invalid @enderror" id="inlineFormCustomSelectPref" required>
                                <option selected>Selecciona un rubro</option>
                                @foreach ($rubros as $rubro)
                                <option value="{{$rubro->id}}">{{$rubro->nombre}}</option>
                                @endforeach
                            </select>
                            @error('rubro')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!--<div class="form-group">
                            <label for="exampleFormControlFile1">Selecciona el documento</label>
                            <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="exampleFormControlFile1" name="file[]"
                            accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf" multiple>
                            @error('file')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <small id="fileHelp" class="form-text text-muted">Sube un documento con un tamaño maximo de 5Mb.</small>
                        </div>-->
                        <div class="input-group hdtuto control-group lst increment">
                            <input type="file" name="filenames[]" class="myfrm form-control @error('filenames') is-invalid @enderror" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf" multiple>
                            <div class="input-group-btn">
                                <button class="btn btn-success file-add ml-1 mr-1" type="button"><i class="fas fa-plus-circle"></i></button>
                            </div>
                            @error('filenames')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="clone hide d-none">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="filenames[]" class="myfrm form-control" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger file-remove ml-1 mr-1" type="button"><i class="fas fa-minus-circle"></i></button>
                                </div>
                            </div>
                        </div>
                        <small id="fileHelp" class="form-text text-muted">Sube un documento con un tamaño maximo de 5Mb.</small>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $(".file-add").click(function() {
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });

        $("body").on("click", ".file-remove", function() {
            $(this).parents(".hdtuto").remove();
        });
    });
</script>
@stop
