<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubros;

class RubrosController extends Controller{
    public function index(){
        $rubros = Rubros::orderBy('id','DESC')->paginate();
        return view('rubros.index', compact('rubros'));
        //return $rubros;
    }

    public function create(){
        return view('rubros.create');
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required'
        ]);

        $rubro  = new Rubros();
        $rubro->nombre = $request->nombre;
        $rubro->descripcion = $request->descripcion;
        $rubro->save();

        return redirect()->route('rubros.index')
                ->with('success','Rubro creado exitosamente.');
    }

    public function show($id){
        $rubro = Rubros::find($id);
        return view('rubros.show', compact('rubro'));
    }

    public function edit($id){
        $rubro = Rubros::find($id);
        return view('rubros.edit', compact('rubro'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required'
        ]);

        $rubro = Rubros::find($id);
        $rubro->nombre = $request->nombre;
        $rubro->descripcion = $request->descripcion;
        $rubro->save();

        return redirect()->route('rubros.show', $rubro)
        ->with('success','Rubro actualizado exitosamente.');
    }

    public function destroy(Request $request, $id){
        $rubro = Rubros::find($id);
        $rubro->delete();

        return redirect()->route('rubros.index')
        ->with('info','Rubro eliminado exitosamente.');
    }
}
