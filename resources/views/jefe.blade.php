@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3 mb-4">
                <div class="d-flex justify-content-between">
                    <h2 class="d-flex justify-content-start">Solicitudes a procesar</h2>
                    <form class="d-flex justify-content-end">
                        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" id="q"
                            onkeyup="search()" style="width: 250px">
                    </form>
                </div>

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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="the_table_body">
                        @foreach ($solicitudes as $solicitud)
                            @if ($solicitud->precio == null && $solicitud->vehiculo_id == null)
                                <tr>
                                    <td>{{ $solicitud->created_at }}</td>
                                    <td>{{ $solicitud->nombre }}</td>
                                    <td>{{ $solicitud->empresa }}</td>
                                    <td>{{ $solicitud->telefono }}</td>
                                    <td>{{ $solicitud->municipioOrigen->municipio }} -
                                        {{ $solicitud->municipioDestino->municipio }} </td>
                                    <td>{{ $solicitud->cargo->cargo }}</td>
                                    <td>{{ $solicitud->carga->carga }}</td>
                                    <td>
                                        <a href="{{ route('procesar-solicitud', $solicitud->id) }}" style="width: 100%;"
                                            class="btn btn-primary" type="submit">Procesar</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style type="text/css">

    </style>

    <script type="text/javascript">
        function search() {
            var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
            num_cols = 7;
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
