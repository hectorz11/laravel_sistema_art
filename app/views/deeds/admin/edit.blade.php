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
                                {{ Form::text('number_deeds', $deed->number_deeds, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Protocolo</label>
                                {{ Form::text('protocol', $deed->protocol, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Folio</label>
                                {{ Form::text('folio', $deed->folio, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Otorgado por</label>
                                {{ Form::text('given_by', $deed->given_by, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>A Favor</label>
                                {{ Form::text('pro', $deed->pro, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Tipo de Escritura</label>
                                {{ Form::text('type_writing', $deed->type_writing, ['class' => 'form-control']) }}
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
                                {{ Form::text('date', $deed->date, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Nro. de Fojas</label>
                                {{ Form::text('number_folios', $deed->number_folios, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                {{ Form::textArea('description', '', ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Resetear</button>
                        </div>
                    </form>
                </div>
                <!-- /.row -->

                <div class='row'>
                    <!--al pulsar en el botón debajo de éste mostraremos los usuarios registrados-->
                    <div class='col-lg-12'>
                        {{ HTML::link(URL::to('#'), 'Ver usuarios registrados', ['class' => 'show_users']) }}  
                        <!--div para mostrar un preloader mientras cargamos los usuarios-->
                        <div style='margin: 10px 0px 0px 300px' class='preload_users'></div>
                        <!--aquí se mostrarán los Expedientes Públicos-->
                        <table class='load_ajax table table-striped table-bordered table-hover'>
                        </table>
                    </div>
                </div>

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

        $('.show_users').bind('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                var id = row.data('1');
                url: '/admin/deeds/' + id + '/edit';
                success: function (data) {
                    $('.preload_users').html('');
                    $('.load_ajax').html(findDeed)
                    var findDeed = '';  
                    findDeed += '<div>' + data.deed.name + '</div>';
                    findDeed += '<div>' + data.deed.number_deed + '</div>';
                    findDeed += '<div>' + data.deed.protocol + '</div>';
                    findDeed += '<div>' + data.deed.folio + '</div>';
                    findDeed += '<div>' + data.deed.given_by + '</div>';
                    findDeed += '<div>' + data.deed.pro + '</div>';
                    $('.load_ajax').html(findDeed)
                }
            })
        });
    });
</script>
@stop