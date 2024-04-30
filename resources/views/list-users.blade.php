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
                    @endif
                </li>
            </ul>
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="agentes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Registrado el</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Registrado el</th>
                            <th></th>
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