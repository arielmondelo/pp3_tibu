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
                            <th scope="col">Origen</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Vehículo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Usuario que eliminó</th>
                        </tr>
                    </thead>
                    <tbody id="the_table_body">
                        @foreach ($trazas as $traza)
                            <tr>
                                <td>{{ $traza->created_at }}</td>
                                <td>{{ $traza->nombre }}</td>
                                <td>{{ $traza->empresa }}</td>
                                <td>{{ $traza->telefono }}</td>
                                <td>{{ $traza->origen }}</td>
                                <td>{{ $traza->destino }}</td>
                                <td>{{ $traza->vehiculo }}</td>
                                <td>{{ $traza->precio }}</td>
                                <td>{{ $traza->usuario }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
