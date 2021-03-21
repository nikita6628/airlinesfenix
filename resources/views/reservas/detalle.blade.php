@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle de Reserva</h1>   
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
                    <p class="card-text">{{$reserva->name}}</p>
                    <h5 class="card-title"><strong>DNI</strong></h5>
                    <p class="card-text">{{$reserva->dni}}</p>
                    <h5 class="card-title"><strong>E-mail</strong></h5>
                    <p class="card-text">{{$reserva->email}}</p>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card">
                <div class="card-header">
                    <h3>Información de Vuelo</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h4><strong>N° Vuelo: </strong>{{$reserva->nro_vuelo}}</h4>
                            <br>
                            <h5><Strong>Origen</Strong></h5>
                            <h6><Strong>Ciudad: </Strong>{{$reserva->origen}}</h6>
                            <h6><Strong>Fecha: </Strong>{{$reserva->fecha_salida}}</h6>
                            <br>
                            <h5><Strong>Destino</Strong></h5>
                            <h6><Strong>Ciudad: </Strong>{{$reserva->destino}}</h6>
                            <h6><Strong>Fecha: </Strong>{{$reserva->fecha_llegada}}</h6>
                            <br>
                            <h6><strong>Cabina: </strong> {{$reserva->cabina}}</h6>
                            <h6><strong>N° asiento: </strong>{{$reserva->asiento}}</h6>
                            <br>
                            <h6>Tarifa: ${{$reserva->tarifa}}</h6>
                        </div>
                        <div class="col-md-4">
                            <h5><strong>Estado de Vuelo</strong></h5>
                            <h6>{{$reserva->estado}}</h6>
                            <p>{{$reserva->descripcion}}</p>
                            <a class='btn btn-warning mb-2' href="{{ url('reservas/'.$reserva->id.'/edit') }}">Modificar Reserva</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Eliminar Reserva
                            </button>
                        </div>    
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Está seguro que desea eliminar la reserva?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Se eliminará la reserva seleccionada, una vez que la operación se haya compeltado un asesor se comunicará con ud para acordar el método de devolución de pago. </p>
            <p>¿Confirma la eliminación?</p> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <form action="{{ route('reservas.destroy', $reserva->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Eliminar Reserva</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

