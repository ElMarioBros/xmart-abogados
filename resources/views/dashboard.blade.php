@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2>Casos legales</h2>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <ul class="nav mx-3 mb-2">
                <li class="nav-item mx-1">
                    @if (auth()->user()->role == App\Models\Role::IS_ADMIN)
                        <a class="btn btn-warning" href="{{ route('user.create') }}">
                            <span class="mx-4">Agregar usuario nuevo</span>
                            <i class="fa fa-fw fa-user-plus"></i> 
                        </a>
                        <a class="btn btn-warning" href="{{ route('user.index') }}">
                            <span class="mx-4">Ver usuarios</span>
                        </a>

                    @else
                        <a class="btn btn-primary" href="{{ route('legalcase.create') }}">
                            <span class="mx-4">Crear nuevo caso</span>
                            <i class="fa fa-fw fa-user-plus"></i> 
                        </a>
                    @endif
                </li>
            </ul>
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="agentes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Expediente</th>
                            <th>Proyecto</th>
                            <th>Tipo de Proyecto</th>
                            <th>Cliente</th>
                            <th>Demandado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($legalCases as $case)
                            <tr>
                                @if (strlen($case->client_photo)>1)
                                    <td><img class="rounded" height="150px" src="{{ asset($case->client_photo) }}"></td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $case->file_number }}</td>
                                <td>{{ $case->project_name }}</td>
                                <td>{{ $case->form_type }}</td>
                                <td>{{ $case->client_name }}</td>
                                <td>{{ $case->defendant_name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('legalcase.show', $case->id) }}">
                                        <i class="far fa-fw fa-id-badge"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Expediente</th>
                            <th>Proyecto</th>
                            <th>Tipo de Proyecto</th>
                            <th>Cliente</th>
                            <th>Demandado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
 
@stop
    
@section('js')
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
        $('#agentes').DataTable( {
            "order": [[ 0, "desc" ]],
            language: {
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "decimal": ".",
                "emptyTable": "No hay datos disponibles en la tabla",
                "zeroRecords": "No se encontraron coincidencias",
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered": "(Filtrado de un total de _MAX_ entradas)",
                "lengthMenu": "Mostrar _MENU_ entradas",
            }  
        } );
    } );

    </script>

@stop