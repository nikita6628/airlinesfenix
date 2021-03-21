<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Vuelo;
use App\Models\Cabina;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $id = Auth::user()->id;  
        
        $reservas = DB::table('reservas')
            ->join('vuelos', 'reservas.vuelo_id', '=', 'vuelos.id')
            ->join('lugars', 'vuelos.origen_id', '=', 'lugars.id')
            ->join('estados', 'vuelos.estado_id', '=', 'estados.id')
            ->select('reservas.id','vuelos.nro_vuelo','vuelos.fecha_salida','lugars.ciudad','estados.tipo')
            ->where('user_id',$id)
            ->get();
        //var_dump($reservas);
        return view('home')->with('reservas', $reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.nueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        /*$id = Auth::user()->id;  
        $reservas = DB::table('reservas')
            ->join('vuelos', 'reservas.vuelo_id', '=', 'vuelo.id')
            ->join('cabinas', 'reservas.cabina_id', '=', 'cabinas.id')
            ->join('estados', 'vuelos.estado_id', '=', 'estados.id')
            ->select('reservas.tarifa', 'reservas.asiento', 'vuelo.nro_vuelo')
            ->where('user_id',$id)
            ->get();
        return view('home')->with('reservas', $reservas);*/
        return view('reservas.detalle');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        return view('reservas.editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
