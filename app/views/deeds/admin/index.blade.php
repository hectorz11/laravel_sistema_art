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
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
                            </a> 
                            <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-lg btn-danger">
                                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
                            </a>
                        </div>
                    </div>
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
<script src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
<script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });

    $(document).ready(function() {
        event.preventDefault()
        $('#tableDeeds').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/deeds',
        });

        $('.show_users').bind('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: '/admin/deeds',
                success: function (data) {
                    $('.preload_users').html('');
                    $('.load_ajax').html(allDeeds)
                    var allDeeds = '';  
                    allDeeds += '<tr>';
                    allDeeds += '<th>Notario</th>';
                    allDeeds += '<th>N. de E. Pública</th>';
                    allDeeds += '<th>Protocolo</th>';
                    allDeeds += '<th>Folio</th>';
                    allDeeds += '<th>Otorgado por</th>';
                    allDeeds += '<th>A favor</th>';
                    allDeeds += '<th>Operaciones</th>';
                    allDeeds += '</tr>';  
                    for(datos in data.deeds){
                        allDeeds += '<tr>';
                        allDeeds += '<td>' + data.deeds[datos].name + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].number_deeds + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].protocol + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].folio + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].given_by + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].pro + '</td>';
                        allDeeds += '<td>';
                        allDeeds += '<a href="#"><span class="label label-info"><i class="glyphicon glyphicon-edit"></i> Editar</span></a>   ';
                        allDeeds += '<a href="#"><span class="label label-danger"><i class="glyphicon glyphicon-remove-circle"></i> Eliminar</span></a>';
                        allDeeds += '</td>'
                        allDeeds += '</tr>';
                    }
                    $('.load_ajax').html(allDeeds)
                }
            })
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });

        function getPosts(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('.posts').html(data);
                location.hash = page;
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }
    });
</script>
@stop