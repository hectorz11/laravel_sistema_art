@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Escrituras Públicas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Editar
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
                    <form role="form" id="formEdit">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nro. de Escrituras Públicas</label>
                                {{ Form::text('number_deeds', '', ['class' => 'form-control', 'id' => 'number_deeds']) }}
                            </div>
                            <div class="form-group">
                                <label>Protocolo</label>
                                {{ Form::text('protocol', '', ['class' => 'form-control', 'id' => 'protocol']) }}
                            </div>
                            <div class="form-group">
                                <label>Folio</label>
                                {{ Form::text('folio', '', ['class' => 'form-control', 'id' => 'folio']) }}
                            </div>
                            <div class="form-group">
                                <label>Otorgado por</label>
                                {{ Form::text('given_by', '', ['class' => 'form-control', 'id' => 'given_by']) }}
                            </div>
                            <div class="form-group">
                                <label>A Favor</label>
                                {{ Form::text('pro', '', ['class' => 'form-control', 'id' => 'pro']) }}
                            </div>
                            <div class="form-group">
                                <label>Tipo de Escritura</label>
                                {{ Form::text('type_writing', '', ['class' => 'form-control', 'id' => 'type_writing']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>A Notario</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                {{ Form::text('date', '', ['class' => 'form-control', 'id' => 'date']) }}
                            </div>
                            <div class="form-group">
                                <label>Nro. de Fojas</label>
                                {{ Form::text('number_folios', '', ['class' => 'form-control', 'id' => 'number_folios']) }}
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                {{ Form::textArea('description', '', ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                            {{ Form::hidden('id', $deed->id, ['id' => 'id']) }}
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Resetear</button>
                        </div>
                    </form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#formEdit').on(function() {
            var id = row.data('id');

            alert(id);
        });
    });
</script>
@stop