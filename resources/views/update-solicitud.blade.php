@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="container py-4 px-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h2>Solicitud número {{ $procesar->id }}</h2>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Nombre" required value="{{ $procesar->nombre }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Empresa" required value="{{ $procesar->empresa }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Teléfono" required value="{{ $procesar->telefono }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Empresa" required value="{{ $procesar->cargo->cargo }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Fecha" value="{{ date('j F, Y') }}" name="fecha" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipo de carga</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Empresa" required value="{{ $procesar->carga->carga }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Origen</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Empresa" required value="{{ $procesar->municipioOrigen->municipio }}"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Destino</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Empresa" required value="{{ $procesar->municipioDestino->municipio }}"
                                        disabled>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="my-3 mt-4">
                        <h2>Distancia: {{ $distancia[0]->km }}Km</h2>
                    </div>
                    <div class="my-3 mt-4" id="combustible">
                        {{-- <h2>Combustible necesario: {{ $distancia[0]->km }}Lt</h2> --}}
                    </div>
                    <div class="my-3 mt-4" id="precio">
                        {{-- <h2>Precio Total: {{ $distancia[0]->km }}MLC</h2> --}}
                    </div>
                </div>

                <div class="card px-2 py-2">
                    <form class="row g-3" method="POST" action="{{ route('update-solicitud', $procesar->id) }}">
                        @csrf
                        <div class="container py-4 px-4">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="mb-3">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Vehículo</th>
                                                    <th scope="col">Chapa</th>
                                                    <th scope="col">Kilometraje</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Chofer</th>
                                                    <th scope="col">Elegir</th>
                                                </tr>
                                            </thead>
                                            <tbody id="the_table_body">
                                                @foreach ($vehiculos as $vehiculo)
                                                    @if ($vehiculo->estado == 'Activo')
                                                        <tr>
                                                            <td>{{ $vehiculo->vehiculo }}</td>

                                                            <td>{{ $vehiculo->chapa }}</td>
                                                            <td id="chapa">{{ $vehiculo->kilometraje }} Km/litro</td>
                                                            <td>{{ $vehiculo->estado }}</td>
                                                            <td>{{ $vehiculo->chofer }}</td>
                                                            <td>
                                                                @if ($vehiculo->estado == 'Roto')
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="radio" id="{{ $vehiculo->id }}"
                                                                            disabled>
                                                                    </div>
                                                                @else
                                                                    <div class="form-check">
                                                                        <input class="form-check-input radio"
                                                                            type="radio" name="radio" id="radio"
                                                                            required onclick="calcular()"
                                                                            value="{{ $vehiculo->id }}">
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <input style="display: none" type="text"
                                                                class="form-control" id="km"
                                                                value=" {{ $distancia[0]->km }}" name="km">
                                                            <div id="precioSend">

                                                            </div>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <button style="width: 100%;" class="btn btn-primary" type="submit">Procesar
                                        solicitud</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        /* $(document).ready(function(){
                    alert('funciona')
                }) */

        function calcular() {
            var name = document.getElementsByName('radio');
            var km = document.getElementById('km').value
            for (var radio of name) {
                if (radio.checked) {
                    document.getElementById('combustible').innerHTML = '<h2>Combustible necesario: ' + Math.round((km /
                            radio.value) * 2) +
                        'Lt</h2>';
                    document.getElementById('precio').innerHTML = '<h2> Precio Total: ' + Math.round(((km / radio
                            .value) * 2) * 40) +
                        'MLC</h2>';
                    document.getElementById('precioSend').innerHTML =
                        '<input style="display: none" type="text" class="form-control" id="precioSend" value="' + Math
                        .round(((km / radio
                            .value) * 2) * 40) + '" name="precioSend">';
                }
            }
        }
    </script>
@endsection
