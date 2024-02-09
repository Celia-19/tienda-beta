<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Indice
    public function index()
    {
        //vista
        $categoria = Categoria::where('estatus', 1)->get(); 
        return view('categoria.index', compact('categoria')); 
        // return view('categoria.index')->with('categoria',Categoria::all());
        
    }

    /**
     * Show the form for creating a new resource.
     */

     //Crear
    public function create()
    {
        //informacion de la vista
        return view('categoria.create');
        
    }


 


    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        //validación de campos requeridos
$this->validate($request, [
    'nombre' => 'required|min:5',
    'descripcion' => 'required',
    
 ]);
 
 
 $categoria = new Categoria();
 $categoria->nombre = $request->input('nombre');
 $categoria->descripcion = $request->input('descripcion');
 $categoria->estatus = $request->has('estatus'); // Asignamos el estatus basado en si la casilla está marcada o no
 
 $categoria->save();
 return redirect()->route('categoria.index')
    ->with('success', 'La categoría se guardo exitosamente');
    }

    /**
     * Display the specified resource.
     */

     //Mostrar
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     //Editar
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.edit')
        ->with('categoria', $categoria);

    }

    /**
     * Update the specified resource in storage.
     */

     //Actualizar
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'descripcion' => 'required',
        ]);
    
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->estatus = $request->has('estatus');
        $categoria->save();
    
        return redirect()->route('categoria.index')
            ->with('success', 'La categoría se ha actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */

     //Borrar
     public function destroy($categoria_id)
     {
         $categoria = Categoria::find($categoria_id);
         if($categoria){
             $categoria->estatus = 0;
             $categoria->save();
             return redirect()->route('categoria.index')->with(
                 "success", "La categoría se ha eliminado correctamente");
         }else{
             return redirect()->route('categoria.index')->with(
                 "error", "La categoría que trata de eliminar no existe");
         } //Fin del IF
     }
     
}
