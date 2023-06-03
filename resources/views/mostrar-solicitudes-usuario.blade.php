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
                            <th scope="col">Nombre</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Origen - Destino</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Tipo Carga</th>
                            <th scope="col">Vehículo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Aprobar</th>
                        </tr>
                    </thead>
                    <tbody id="the_table_body">
                        @foreach ($solicitudes as $solicitud)
                            <tr>
                                <td>{{ $solicitud->created_at }}</td>
                                <td>{{ $solicitud->nombre }}</td>
                                <td>{{ $solicitud->empresa }}</td>
                                <td>{{ $solicitud->telefono }}</td>
                                <td>{{ $solicitud->municipioOrigen->municipio }} -
                                    {{ $solicitud->municipioDestino->municipio }} </td>
                                <td>{{ $solicitud->cargo->cargo }}</td>
                                <td>{{ $solicitud->carga->carga }}</td>
                                @if ($solicitud->vehiculo != null)
                                    <td>{{ $solicitud->vehiculo->vehiculo }}</td>
                                    <td>{{ $solicitud->precio }}MLC</td>
                                    @if ($solicitud->aprobacion == 0)
                                        <form class="" id="editVehiculo{{ $solicitud->id }}" method="POST"
                                            action="{{ route('aprobar-solicitud', $solicitud->id) }}">
                                            @csrf
                                            <td><button style="width:100%" class="btn btn-success"
                                                    type="submit">Aprobar</button>
                                            </td>
                                        </form>
                                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#abcd{{ $solicitud->id }}">
                                                Cancelar
                                            </button></td>
                                    @else
                                        <td>
                                            <h4 style="color:green">Aprobado</h4>
                                        </td>
                                    @endif
                                @else
                                    <td>-</td>
                                    <td>-</td>
                                    <td style="color:red">
                                        <h4>En espera</h4>
                                    </td>
                                @endif
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="abcd{{ $solicitud->id }}" tabindex="-1"
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
                                                <h5>Está seguro que quiere aliminar la solicitud. Puede contactar con nuestro equipo de asistencia en línea 7-XXX-XXXX para consultar cualquier duda o sugerencia.</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button style="width:100%" class="btn btn-danger" type="submit"
                                                id="eliminarArticulo"
                                                onclick="eliminarArticulo({{ $solicitud->id }})">Eliminar</button>
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

        function eliminarArticulo(id) {
            $.ajax({
                url: '/eliminarArticulo/' + id,
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
