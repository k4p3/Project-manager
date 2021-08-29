<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\Areas;
use App\Models\Estatus;
use App\Models\Rubros;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProyectosController extends Controller
{
    public function index(){
        //$proyectos = Proyectos::orderBy('id','DESC')->paginate();
        $proyectos = DB::table('proyectos')
            ->join('areas', 'proyectos.area_id', '=', 'areas.id')
            ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
            ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
            ->get();
        return view('proyectos.index', compact('proyectos'));
        //return $proyectos;


    }

    public function create(){
        $areas = Areas::orderBy('id','DESC')->paginate();
        $rubros = Rubros::orderBy('id','DESC')->paginate();

        return view('proyectos.create', compact('areas','rubros'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'clave'  => 'required|integer',
            'descripcion' => 'required',
            'limite' => 'required',
            'presupuesto' => 'required',
            'area'   => 'required|integer',
            'file' => 'required|mimes:doc,docx,odt,pdf|max:1024',
        ]);

        $proyecto  = new Proyectos();

        if($request->file()) {
            try{
                $name = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');

                $proyecto->nombre = $request->nombre;
                $proyecto->clave = $request->clave;
                $proyecto->descripcion = $request->descripcion;
                $proyecto->limite = $request->limite;
                $proyecto->presupuesto = $request->presupuesto;
                $proyecto->documento = '/storage/' . $filePath;
                $proyecto->area_id = $request->area;
                $proyecto->rubro_id = $request->rubro;
                $proyecto->estatus_id = 1;
                $proyecto->user_id = Auth::id();
                $proyecto->save();

            } catch (PostTooLargeException $e) {
                return 'Failed';
            }
        }

        return redirect()->route('proyectos.index')
                ->with('success','Proyecto creado exitosamente.')
                ->with('file', $name);;
    }

    public function show($id){
        //$proyecto = Proyectos::find($id);
        $proyecto = DB::table('proyectos')
            ->join('areas', 'proyectos.area_id', '=', 'areas.id')
            ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
            ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
            ->where('proyectos.id', '=', $id)
            ->first();
        //return $proyecto;
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit($id){
        $proyecto = Proyectos::find($id);
        $areas = Areas::orderBy('id','DESC')->paginate();
        return view('proyectos.edit', compact('proyecto', 'areas'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required'
        ]);

        $proyecto = Proyectos::find($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->limite = $request->limite;
        $proyecto->presupuesto = $request->presupuesto;
        $proyecto->save();

        return redirect()->route('proyectos.show', $proyecto)
        ->with('success','Proyecto actualizado exitosamente.');
    }

    public function destroy(Request $request, $id){
        $proyecto = Proyectos::find($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')
        ->with('info','Proyecto eliminado exitosamente.');
    }

    public function siguiente($id){
        $proyecto = Proyectos::find($id);
        $proyecto->estatus_id = 2;
        $proyecto->save();

        return redirect()->route('proyectos.show', $proyecto)
        ->with('success','Proyecto enviado al departamento de finanzas');
    }

    public function asigna($id){
        $proyecto = DB::table('proyectos')
            ->join('areas', 'proyectos.area_id', '=', 'areas.id')
            ->join('estatus', 'proyectos.estatus_id', '=', 'estatus.id')
            ->select('proyectos.*', 'areas.nombre as area', 'estatus.nombre as estatus')
            ->where('proyectos.id', '=', $id)
            ->first();
        $areas = Areas::orderBy('id','DESC')->paginate();

        return view('proyectos.presupuesto2', compact('proyecto', 'areas'));
    }

    public function asigna_pre(Request $request, $id){
        $request->validate([
            'pasignado' => 'required'
        ]);

        $proyecto = Proyectos::find($id);
        $proyecto->pasignado = $request->pasignado;
        $proyecto->estatus_id = 3;
        $proyecto->save();

        return redirect()->route('proyectos.show', $proyecto)
        ->with('success','Proyecto actualizado exitosamente.');
    }

    public function autoriza($id){
        $proyecto = Proyectos::find($id);
        $proyecto->estatus_id = 4;
        $proyecto->save();

        return redirect()->route('proyectos.show', $proyecto)
        ->with('success','Proyecto aprobado exitosamente.');
    }

    public function rechaza($id){
        $proyecto = Proyectos::find($id);
        $proyecto->estatus_id = 5;
        $proyecto->save();

        return redirect()->route('proyectos.index', $proyecto)
        ->with('success','El proyecto se ha rechazado corrrectamente.');
    }
}
