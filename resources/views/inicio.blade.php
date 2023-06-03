@extends('layout.main')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('contacto') }}" class="mt-5 btn btn-dark">Boton</a>
                @foreach ($solicitudes as $solicitud)
                    <h1>nombre:{{ $solicitud->nombre }}</h1>
                    <h1>empresa:{{ $solicitud->empresa }}</h1>
                    <h1>telefono:{{ $solicitud->telefono }}</h1>
                    <h1>fecha:{{ $solicitud->fecha }}</h1>
                @endforeach
            </div>
        </div>
    </div>
@endsection
