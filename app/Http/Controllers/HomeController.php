<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Cargo;
use App\Models\Carga;
use App\Models\Municipio;
use App\Models\Distancia;
use App\Models\Vehiculo;
use App\Models\User;
use App\Models\UserEliminado;
use App\Models\SolicitudEliminada;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $loggued_rol = auth()->user()->rol;
        if ($loggued_rol == 1) {
            return view('admin');
        } elseif ($loggued_rol == 2) {
            $solicitudes = Solicitud::all();
            return view('jefe', compact('solicitudes'));
        } elseif ($loggued_rol == 3) {
            return view('cliente');
        }
    }   
}
