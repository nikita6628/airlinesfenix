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
                <form action="{{ route('reservas.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col md-3">
                                <strong>Vuelos Disponibles</strong>
                            </div>
                            <div class="col md-9">
                                <select name="vuelo_id" id="vuelo_id">
                                @foreach ($vuelos as $vuelo)
                                    <option value="{{$vuelo->id}}">{{$vuelo->nro_vuelo . " | " . $vuelo->origen . " | " . $vuelo->destino}}</option>
                                @endforeach    
                                </select>
                            </div>
                        </div> 
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col md-3">
                                    <strong>Tipo Cabina</strong>
                                </div> 
                                <div class="col md-9">
                                    <select name="cabina_id" id="cabina_id">
                                        @foreach ($cabinas as $cabina)
                                            <option value="{{$cabina->id}}">{{$cabina->tipo}}</option>
                                        @endforeach    
                                    </select>
                                </div>    
                            </div>
                        </div>    
                        <div class="form-group">
                            <div class="row">
                                <div class="col md-3">
                                    <strong>Asiento</strong>
                                </div>
                                <div class="col md-9">
                                <select name="asiento" id="asiento">
                                    @foreach ($asientos as $asiento)
                                        <option value="{{$asiento}}">{{$asiento}}</option>
                                    @endforeach    
                                </select>
                                </div>
                            </div>                     
                        </div> 
                        <div class="form-group">
                            <div class="row">
                                <div class="col md-3">
                                    <strong>Tarifa Base</strong>
                                </div>
                                <div class="col md-9">
                                    <input readonly type="text" id="tarifa" name="tarifa" class="form-control" placeholder="Precio" value="{{$vuelo->precio_base}}">
                                </div>
                            </div>                     
                        </div>       
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Generar Reserva</button>
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>
@endsection