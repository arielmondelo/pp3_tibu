@extends('layouts.app')

@section('content')
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
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="the_table_body">
                            @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->vehiculo }}</td>

                                    <td>{{ $vehiculo->chapa }}</td>
                                    <td id="chapa">{{ $vehiculo->kilometraje }} Km/litro</td>
                                    @if ($vehiculo->estado == 'Roto')
                                        <td style="color:red">{{ $vehiculo->estado }}</td>
                                    @else
                                        <td style="color:green">{{ $vehiculo->estado }}</td>
                                    @endif
                                    <td>{{ $vehiculo->chofer }}</td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#abcd{{ $vehiculo->id }}">
                                            Editar
                                        </button></td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="abcd{{ $vehiculo->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar estado.</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form class="" id="editVehiculo{{ $vehiculo->id }}" method="POST"
                                                action="{{ route('editar-vehiculo', $vehiculo->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Estado
                                                            *</label>
                                                        <select class="form-select" id="validationDefault04" required
                                                            name="estado">
                                                            <option selected disabled value="{{ $vehiculo->estado }}">
                                                                {{ $vehiculo->estado }}
                                                            </option>
                                                            @if ($vehiculo->estado == 'Roto')
                                                                <option value="Activo">Activo
                                                                </option>
                                                            @elseif ($vehiculo->estado == 'Activo')
                                                                <option value="Roto">Roto
                                                                </option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id='myajax' {{--  onclick="editVehiculo({{ $vehiculo->id }})" --}}
                                                        class="btn btn-primary">Cambiar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function editVehiculo(id) {
            event.preventDefault();
            //we will send data and recive data fom our AjaxController
            $.ajax({
                url: 'editar-vehiculo/234{id}556',
                data: {
                    'name': "luis"
                },
                type: 'post',
                success: function(response) {
                    alert(response);
                },
                statusCode: {
                    404: function() {
                        alert('web not found');
                    }
                },
                error: function(x, xs, xt) {
                    //nos dara el error si es que hay alguno
                    window.open(JSON.stringify(x));
                    //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
            });
        };
    </script> --}}
@endsection
