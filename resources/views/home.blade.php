@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Bienvenid@ <strong>{{ Auth::user()->name }}</strong> !!!</h1>   

            @if (count($reservas) === 0)
                <div>
                    <h2>Aún no tiene reservas activas, comience hoy mismo!!!</h2>
                </div>
            @else
                <h2>Estas son sus reservas activas:</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nro Vuelo</th>
                            <th scope="col">Fecha Salida</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $index=>$reserva)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$reserva->nro_vuelo}}</td>
                            <td>{{$reserva->fecha_salida}}</td>
                            <td>{{$reserva->ciudad}}</td>
                            <td>{{$reserva->tipo}}</td>
                            <td><a class='btn btn-success' href="{{ url('reservas/'.$reserva->id) }}">Ver Detalle</a><a class='btn btn-danger' href="{{ url('reservas/'.$reserva->id.'/edit') }}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <h4>Cree una nueva reserva y vuele hacia sus sueños</h4>
            <button class='btn btn-primary'>Nueva Reserva</button>
        </div>
    </div>
</div>
@endsection
