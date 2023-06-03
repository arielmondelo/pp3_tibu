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
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo de acción</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Usuario objetivo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="the_table_body">
                        @foreach ($trazas as $traza)
                            <tr>
                                
                                    <td>{{ $traza->created_at }}</td>
                                    <td>{{ $traza->tipo_cambio }}</td>
                                    <td>{{ $traza->usuario }}</td>
                                    <td>{{ $traza->usuario_objetivo }}</td>

                                   {{--  <td class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#abcd{{ $usuario->id }}">
                                            Cambiar Rol
                                        </button>
                                        <button type="button" class=" mx-1 btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#efg{{ $usuario->id }}">
                                            Eliminar
                                        </button>
                                    </td> --}}
                               
                            </tr>

                            <!-- Modal -->
                           {{--  <div class="modal fade" id="efg{{ $usuario->id }}" tabindex="-1"
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
                                                id="eliminarArticulo"
                                                onclick="eliminarArticulo({{ $usuario->id }})">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ajax --}}
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function eliminarArticulo(id) {
            $.ajax({
                url: 'eliminarUsuario/' + id,
                type: 'POST',
                success: function(result) {
                    location.reload();
                }
            })
        };
    </script> --}}

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
