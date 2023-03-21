<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulos::all();

        return view('articulos',compact('articulos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $user = $request->user();

    // Obtener los datos del formulario
    $titulo = $request->input('titulo');
    $contenido = $request->input('contenido');
    $userid = $user->id;
    $username = $user->name;

    // Crear una nueva instancia del modelo Articulo con los datos del formulario
    $articulos = new Articulos;
    $articulos->titulo = $titulo;
    $articulos->contenido = $contenido;
    $articulos->user_id = $userid;
    $articulos->user_name = $username;



    // Guardar el artículo en la base de datos
    $articulos->save();

    // Redireccionar a la página de inicio o a otra página
    return redirect('/articulos');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulos = Articulos::find($id);
        return view('articulos.edit', compact('articulos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $articulo = Articulos::findOrFail($id);

    $articulo->titulo = $request->input('titulo');
    $articulo->contenido = $request->input('contenido');

    $articulo->save();

    $articulos = Articulos::all();

    return view('dashboard',compact('articulos'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulos = Articulos::find($id);
        if ($articulos) {
            $articulos->delete();
        }
        return redirect()->route('articulos.index');
    }
    
}
