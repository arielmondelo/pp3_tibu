@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3 mb-4">
                <form class="d-flex justify-content-end">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" id="q"
                        onkeyup="search()" style="width: 250px">
                </form>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Fecha de creación</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="the_table_body">
                        @foreach ($usuarios as $usuario)
                            <tr>
                                @if ($usuario->rol != 1)
                                    <td>{{ $usuario->created_at }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    @if ($usuario->rol == 2)
                                        <td>Jefe</td>
                                    @else
                                        <td>Cliente</td>
                                    @endif


                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#efg{{ $usuario->id }}">
                                            Cambiar Rol
                                        </button>
                                        <button type="button" class=" mx-1 btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#abcd{{ $usuario->id }}">
                                            Eliminar
                                        </button>
                                    </td>
                                @endif
                            </tr>

                            <!-- Modal editar -->
                            <div class="modal fade" id="efg{{ $usuario->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar solicitud.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form class="" id="editarRol{{ $usuario->id }}" method="POST"
                                            action="{{ route('editar-rol', $usuario->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Rol</label>
                                                    <select class="form-select" id="validationDefault04" required
                                                        name="rol">
                                                        @if ($usuario->rol == 2)
                                                            <option selected disabled value="2">
                                                                Jefe
                                                            </option>
                                                        @else
                                                            <option selected disabled value="3">
                                                                Cliente
                                                            </option>
                                                        @endif
                                                        @if ($usuario->rol == 2)
                                                            <option value="3">Cliente
                                                            </option>
                                                        @elseif ($usuario->rol == 3)
                                                            <option value="2">Jefe
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id='myajax'
                                                    class="btn btn-primary">Cambiar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal eliminar -->
                            <div class="modal fade" id="abcd{{ $usuario->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar solicitud.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h5>Está seguro que quiere aliminar al usuario</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button style="width:100%" class="btn btn-danger" type="submit"
                                                id="eliminarUsuario"
                                                onclick="eliminarUsuario({{ $usuario->id }})">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ajax --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function eliminarUsuario(id) {
            $.ajax({
                url: 'eliminarUsuario/' + id,
                type: 'POST',
                success: function(result) {
                    location.reload();
                }
            })
        };
    </script>

    <script type="text/javascript">
        function search() {
            var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
            num_cols = 10;
            input = document.getElementById("q");
            filter = input.value.toUpperCase();
            table_body = document.getElementById("the_table_body");
            tr = table_body.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                display = "none";
                for (j = 0; j < num_cols; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            display = "";
                        }
                    }
                }
                tr[i].style.display = display;
            }
        }
    </script>
@endsection
