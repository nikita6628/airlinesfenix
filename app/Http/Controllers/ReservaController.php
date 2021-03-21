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
        return view('home')->with('reservas', $reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr = Auth::user();  
        $vuelos = DB::table('vuelos as v')
            ->join('lugars as o', 'v.origen_id', '=', 'o.id')
            ->join('lugars as d', 'v.destino_id', '=', 'd.id')
            ->select('v.id','v.nro_vuelo','v.fecha_salida','v.fecha_llegada','o.ciudad as origen','d.ciudad as destino','v.precio_base')
            ->get();
        $cabinas=Cabina::get();
        $asientos=[1,2,3,4,5,6,7,8,9,10];
        return view('reservas.nueva')
            ->with('vuelos', $vuelos)
            ->with('usr', $usr)
            ->with('cabinas',$cabinas)
            ->with('asientos',$asientos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::user()->id]);
        $request->validate([
           'user_id' => 'required',
           'vuelo_id' => 'required',
           'cabina_id' => 'required',
           'asiento' => 'required',
           'tarifa' => 'required'
       ]);
       
       Reserva::create($request->all());
    
       return redirect()->route('home')
                       ->with('success','La reserva ha sido creada exitosamente!!');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usr_id = Auth::user()->id;  
        $reserva = DB::table('reservas as r')
            ->join('vuelos as v', 'v.id', '=', 'r.vuelo_id')
            ->join('cabinas as c', 'c.id', '=', 'r.cabina_id')
            ->join('users as u', 'u.id', '=', 'r.user_id')
            ->join('lugars as o', 'v.origen_id', '=', 'o.id')
            ->join('lugars as d', 'v.destino_id', '=', 'd.id')
            ->join('estados as e', 'v.estado_id', '=', 'e.id')
            ->select('r.id', 'r.tarifa','r.asiento','v.nro_vuelo','v.fecha_salida','v.fecha_llegada','o.ciudad as origen','d.ciudad as destino','c.tipo as cabina','e.tipo as estado','e.descripcion','u.name','u.dni','u.email')
            ->where('r.user_id',$usr_id)
            ->where('r.id',$id)
            ->get();

        return view('reservas.detalle')->with('reserva', $reserva[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usr_id = Auth::user()->id;  
        $reserva = DB::table('reservas as r')
            ->join('vuelos as v', 'v.id', '=', 'r.vuelo_id')
            ->join('cabinas as c', 'c.id', '=', 'r.cabina_id')
            ->join('users as u', 'u.id', '=', 'r.user_id')
            ->join('lugars as o', 'v.origen_id', '=', 'o.id')
            ->join('lugars as d', 'v.destino_id', '=', 'd.id')
            ->join('estados as e', 'v.estado_id', '=', 'e.id')
            ->select('r.id', 'r.tarifa','r.asiento','v.nro_vuelo','v.fecha_salida','v.fecha_llegada','o.ciudad as origen','d.ciudad as destino','c.tipo as cabina','e.tipo as estado','e.descripcion')
            ->where('r.user_id',$usr_id)
            ->where('r.id',$id)
            ->get();
            return view('reservas.editar')->with('reserva', $reserva);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=Reserva::find($id);
        $reserva->delete();

        return redirect()->route('home')
            ->with('success', 'La reserva se ha eliminada correctamente');
    }
}



