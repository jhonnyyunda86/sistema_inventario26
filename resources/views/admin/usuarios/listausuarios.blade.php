@extends('layouts.sidebaradmin')

@section('tituloPagina', 'Listado de Usuarios')

@section('content')

<div class="card shadow-lg rounded-xl border-0 overflow-hidden bg-white mt-4">
    <div class="card-header bg-gradient-to-r from-agro-500 to-agro-700 text-white border-b-0 py-4 px-6 flex justify-between items-center">
        <h3 class="card-title text-xl font-semibold m-0 text-white">Listado de Usuarios</h3>
    </div>
    <div class="card-body p-6">
        <table id="usuariosTable" class="table w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 font-medium">ID</th>
                    <th class="px-6 py-3 font-medium">Nombre</th>
                    <th class="px-6 py-3 font-medium">Email</th>
                    <th class="px-6 py-3 font-medium">Rol</th>
                    <th class="px-6 py-3 font-medium text-center">Estado</th>
                    <th class="px-6 py-3 font-medium text-center">Editar</th>
                    <th class="px-6 py-3 font-medium text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($usuarios as $usuario)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $usuario->id }}</td>
                        <td class="px-6 py-4">{{ $usuario->name }}</td>
                        <td class="px-6 py-4">{{ $usuario->email }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-agro-100 text-agro-800 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-agro-200">
                                {{ $usuario->role->nombre ?? 'Sin Rol' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($usuario->estado == 'activo')
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Activo</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Inactivo</span>
                            @endif
                        </td>
                        <td><button type="button" 
        class="btn btn-success btn-sm editbtn d-flex align-items-center justify-content-center"
        data-bs-toggle="modal" 
        data-bs-target="#editar"
        data-id="{{ $usuario->id }}"
        data-name="{{ $usuario->name }}"
        data-email="{{ $usuario->email }}"
        data-role="{{ $usuario->role_id }}"
        data-estado="{{ $usuario->estado }}"
        style="width:35px; height:35px; border-radius:8px;">
    <i class="fa-solid fa-pen"></i>
</button>
</td>
<td>                     
                            <form action="#" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger deletebtn" data-id="{{ $usuario->id }}"
                                        data-bs-toggle="modal" data-bs-target="#eliminar">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
          <!-- Modal de Edición -->
            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditar" action="{{ route('usuarios.update', $usuario->id)  }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarLabel">Editar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit-id">
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" id="edit-name" name="name">
                                </div>  
                                <div class="mb-3">
                                    <label for="edit-email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="edit-email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-role" class="form-label">Rol</label>
                                    <select class="form-control" id="edit-role" name="role" required>
                                        <option value="">Seleccionar</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-estado" class="form-label">Estado</label>
                                    <select class="form-control" id="edit-estado" name="estado" required>
                                        <option value="">Seleccionar</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                    <!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminar" action="{{ route('usuarios.destroy', $usuario->id)  }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este Usuario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    
    <script>
        $(function () {
            $("#usuariosTable").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                }
            }).buttons().container().appendTo('#usuariosTable_wrapper .col-md-6:eq(0)');
        });
    </script>




<script>
    $(document).ready(function () {
        // Usar el evento show.bs.modal de Bootstrap para poblar los datos
        $('#editar').on('show.bs.modal', function (event) {
            // El botón que disparó el modal
            var button = $(event.relatedTarget);
            
            // Extraer la información de los atributos data-*
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var role = button.data('role');
            var estado = button.data('estado');

            // Actualizar el contenido del modal
            var modal = $(this);
            modal.find('#formEditar').attr('action', `/usuarios/${id}`);
            modal.find('#edit-id').val(id);
            modal.find('#edit-name').val(name);
            modal.find('#edit-email').val(email);
            modal.find('#edit-role').val(role);
            modal.find('#edit-estado').val(estado);
        });

        $('#eliminar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('#formEliminar').attr('action', `/usuarios/${id}`);
        });
    });
</script>
@endsection