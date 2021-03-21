@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Nueva Reserva</h1>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card">
                <div class="card-header">
                    <h3>Datos del Pasajero</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><strong>Nombre y Apellido</strong></h5>
                    <p class="card-text">{{$usr->name}}</p>
                    <h5 class="card-title"><strong>DNI</strong></h5>
                    <p class="card-text">{{$usr->dni}}</p>
                    <h5 class="card-title"><strong>E-mail</strong></h5>
                    <p class="card-text">{{$usr->email}}</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>Ofertas Disponibles</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card">
                <div class="card-header">
                    <h3>Seleccione vuelo</h3>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer">
                    <a class="btn">Generar Reserva</a>
                </div>     
            </div>
        </div>
    </div>
</div>
@endsection