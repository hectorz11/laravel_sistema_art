@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Comentarios</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lista
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                @if(Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endif

                <div class="row">
                    <div class="col-lg-12">
                    <link href="http://hectorz11.github.io/laravel_sistema_art/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
                        <table class="table table-striped table-bordered" id="tableComments">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Comentario</th>
                                    <th>Correo Electrónico</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-actions" align="center">
                            <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-lg btn-danger">
                                <i class="fa fa-home"></i> Regresar al Menu Principal
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<div class="modal fade" id="Send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-share"></i> Enviar Respuesta<br>
                </h4>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                {{ Form::open(['route' => 'admin.comments.message', 'id' => 'formEdit', 'method' => 'POST']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Comentario</label>
                            {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-12">
                            <label>Respuesta</label>
                            {{ Form::textArea('answer', '', ['class' => 'form-control', 'rows' => 3]) }}
                        </div>
                    </div><br>
                    {{ Form::hidden('description') }}
                    {{ Form::hidden('idComment') }}
                    {{ Form::hidden('comments', '', ['id' => 'val']) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Enviar</button>
                </form>
                {{ Form::close() }}
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-share"></i> Eliminar Comentario<br>
                </h4>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                {{ Form::open(['route' => 'admin.comments.delete', 'id' => 'formEdit', 'method' => 'DELETE']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Comentario</label>
                            {{ Form::text('description', Input::old('description'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    {{ Form::hidden('idComment') }}
                    {{ Form::hidden('comments', '', ['id' => 'val']) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Eliminar</button>
                </form>
                {{ Form::close() }}
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script src="http://hectorz11.github.io/laravel_sistema_art/assets/js/jquery-1.11.0.min.js"></script>
<script src="http://hectorz11.github.io/laravel_sistema_art/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="http://hectorz11.github.io/laravel_sistema_art/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="{{ URL::asset('/scripts/comments.js') }}"></script>
<script>
    $(document).ready(function() {
        event.preventDefault()

        $("#tableComments").on("click", ".operation", function(e){
            $('[name=comments]').val($(this).attr ('id'));
            var faction = "<?php echo URL::route('admin.comments.modal.data'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idComment"]').val(json.idComment);
                    $('#formEdit input[name="description"]').val(json.description);
                    $('#formEdit input[name="email"]').val(json.email);
                    $('#load').hide();
                } else {
                    $('#errorMessage').html(json.message);
                    $('#errorMessage').show();
                }
            });
        });
    });
</script>
@stop
