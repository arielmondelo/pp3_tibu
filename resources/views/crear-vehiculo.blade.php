@extends('layouts.app')

@section('content')
    <div class="container py-4 px-4">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <form class="row g-3" method="POST" action="{{ route('guardar-vehiculo') }}">
                        @csrf
                        <div class="container py-5 px-5">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Crear nuevo vehículo.</h2>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Vehículo *</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Vehículo" required name="vehiculo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Chapa *</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Chapa" required name="chapa">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kilometraje *</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Kilometraje" required name="km">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Estado *</label>
                                        <select class="form-select" id="validationDefault04" required name="estado">
                                            <option selected disabled value="">Seleccione estado</option>
                                            <option value="Roto">Roto
                                            </option>
                                            <option value="Activo">Activo
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="exampleFormControlInput1" class="form-label">Chofer *</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Chofer" required name="chofer">
                                    </div>
                                    <button style="width: 100%;" class="btn btn-primary mt-4" type="submit">Crear
                                        vehículo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
