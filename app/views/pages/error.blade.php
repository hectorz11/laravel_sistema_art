@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Error <small>No tiene permisos, comunicarse con el Administrador</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Error
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
@stop