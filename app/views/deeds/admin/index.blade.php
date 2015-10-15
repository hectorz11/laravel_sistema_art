@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Escrituras Públicas</small>
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
                    <link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
                        <table class="table table-striped table-bordered table-hover" id="tableDeeds">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Notario</th>
                                    <th>Nro. de E. Pública</th>
                                    <th>Protocolo</th>
                                    <th>Folio</th>
                                    <th>Otorgado por</th>
                                    <th>A favor</th>
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
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-actions" align="center">
                            <a href="{{ URL::route('admin.deeds.create') }}" class="btn btn-lg btn-primary" name="ingresar">
                                <i class="fa fa-plus-circle"></i> Ingresar Nuevo Registro
                            </a> 
                            <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-lg btn-danger">
                                <i class="fa fa-home"></i> Regresar al Menu Principal
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-share"></i> Eliminar Escritura Pública<br>
                    <span id="load"><center><img src="{{ asset('img/loading1.gif')}}"> Cargando...</center></span>
                </h4>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                {{ Form::open(['route' => 'admin.deeds.delete', 'id' => 'formEdit', 'method' => 'DELETE']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Número de Escritura Pública</label>
                            {{ Form::text('numberDeeds', Input::old('numberDeeds'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    {{ Form::hidden('idDeed') }}
                    {{ Form::hidden('deeds', '', ['id' => 'val']) }}
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
<script src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('/scripts/deeds.js') }}"></script>
<script>
    $(document).ready(function() {
        event.preventDefault()

        $("#tableDeeds").on("click", ".delete", function(e){
            $('[name=deeds]').val($(this).attr ('id'));
            var faction = "<?php echo URL::route('admin.deeds.modal.data'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idDeed"]').val(json.idDeed);
                    $('#formEdit input[name="numberDeeds"]').val(json.numberDeeds);
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