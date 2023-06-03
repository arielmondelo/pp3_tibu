@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="row g-3" method="POST" action="{{ route('crear-solicitud') }}">
                        @csrf
                        <div class="container py-5 px-5">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Solicitud contrato de servicios.</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nombre *</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Nombre" required name="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Empresa *</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Empresa" required name="empresa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Teléfono *</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Teléfono" maxlength="7" required name="telef">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cargo *</label>
                                        <select class="form-select" id="validationDefault04" required name="cargo">
                                            <option selected disabled value="">Seleccione cargo</option>
                                            @foreach ($cargos as $cargo)
                                                <option value="{{ $cargo->id }}">{{ $cargo->cargo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Fecha" value="{{ date('j F, Y') }}" name="fecha" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Origen *</label>
                                        <select class="form-select" id="validationDefault04" required
                                            name="municipio_origen">
                                            <option selected disabled value="">Seleccione municipio</option>
                                            @foreach ($municipios as $municipio)
                                                <option value="{{ $municipio->id }}">{{ $municipio->municipio }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Destino *</label>
                                        <select class="form-select" id="validationDefault04" required
                                            name="municipio_destino">
                                            <option selected disabled value="">Seleccione municipio</option>
                                            @foreach ($municipios as $municipio)
                                                <option value="{{ $municipio->id }}">{{ $municipio->municipio }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tipo de carga *</label>
                                        <select class="form-select" id="validationDefault04" required name="carga">
                                            <option selected disabled value="">Seleccione carga</option>
                                            @foreach ($cargas as $carga)
                                                <option value="{{ $carga->id }}">{{ $carga->carga }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button style="width: 100%;" class="btn btn-primary" type="submit">Enviar
                                        solicitud</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
