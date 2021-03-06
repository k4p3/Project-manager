<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;
use Illuminate\Support\Facades\Auth;

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
    public function index(){

        $user  = Auth::user();
        $roles = $user->getRoleNames();

        $roles = json_decode( json_encode( $roles ), true );

        if (in_array('Admin', (array)$roles)) {
            $proyectos = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
                ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
                ->join('users', 'proyectos.user_id', '=', 'users.id')
                ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus', 'users.name as usuario')
                ->get();

            return view('proyectos.index', compact('proyectos'));

        }elseif (in_array("Jefe Area", (array)$roles)) {
            $proyectos_por = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
                ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
                ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
                ->where('proyectos.estatus_id', '=', 1)
                ->where('proyectos.area_id', $user->areas_id)
                ->get();

            $proyectos_apro = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
               ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
               ->join('proyectos_seguimiento','proyectos_seguimiento.proyectos_id', '=', 'proyectos.id')
               ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
               ->where('proyectos.area_id', $user->areas_id)
               ->where('proyectos_seguimiento.user_id', $user->id)
               ->get();

            //return $proyectos;
            return view('home.jefe', compact('proyectos_por','proyectos_apro'));
        }elseif (in_array("Normal", (array)$roles)) {
            $proyectos = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
            ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
            ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus', 'estatus.id as estatus_id')
            ->where('proyectos.user_id', '=', $user->id)
            ->get();

            return view('home.user', compact('proyectos'));
        }elseif (in_array("Finanzas", (array)$roles)) {

            $proyectos = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
                ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
                ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
                ->where('proyectos.estatus_id', '=', 2)
                ->get();

            $proyectos_apro = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
            ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
            ->join('proyectos_seguimiento','proyectos_seguimiento.proyectos_id', '=', 'proyectos.id')
            ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
            ->where('proyectos_seguimiento.user_id', $user->id)
            ->get();

            return view('home.finanzas', compact('proyectos', 'proyectos_apro'));

        }elseif (in_array("Direccion", (array)$roles)) {

            $proyectos = Proyectos::join('areas', 'proyectos.area_id', '=', 'areas.id')
                ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
                ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
                ->where('proyectos.estatus_id', '=', 3)
                ->get();

            return view('home.direccion', compact('proyectos'));
        }
    }
}
