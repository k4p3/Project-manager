<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller{
    //

    public function index(){
        $areas = Areas::orderBy('id','DESC')->paginate();
        return view('areas.index', compact('areas'));
        //return $areas;
    }

    public function create(){
        return view('areas.create');
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required'
        ]);

        $area  = new Areas();
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();

        return redirect()->route('areas.index')
                ->with('success','Nivel creado exitosamente.');
    }

    public function show($id){
        $area = Areas::find($id);
        return view('areas.show', compact('area'));
    }

    public function edit($id){
        $area = Areas::find($id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required'
        ]);

        $area = Areas::find($id);
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();

        return redirect()->route('areas.show', $area)
        ->with('success','Nivel actualizado exitosamente.');
    }

    public function destroy(Request $request, $id){
        $area = Areas::find($id);
        $area->delete();

        return redirect()->route('areas.index')
        ->with('info','Nivel eliminado exitosamente.');
    }
}
