<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estatus;

class EstatusController extends Controller{
    public function index(){
        $estatus = Estatus::orderBy('id','DESC')->paginate();
        return view('estatus.index', compact('estatus'));
        //return $estatus;
    }

    public function create(){
        return view('estatus.create');
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required'
        ]);

        $area  = new Estatus();
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();

        return redirect()->route('estatus.index')
                ->with('success','Eestatus creado exitosamente.');
    }

    public function show($id){
        $area = Estatus::find($id);
        return view('estatus.show', compact('area'));
    }

    public function edit($id){
        $area = Estatus::find($id);
        return view('estatus.edit', compact('area'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required'
        ]);

        $area = Estatus::find($id);
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();

        return redirect()->route('estatus.show', $area)
        ->with('success','Eestatus actualizado exitosamente.');
    }

    public function destroy(Request $request, $id){
        $area = Estatus::find($id);
        $area->delete();

        return redirect()->route('estatus.index')
        ->with('info','Eestatus eliminado exitosamente.');
    }
}
