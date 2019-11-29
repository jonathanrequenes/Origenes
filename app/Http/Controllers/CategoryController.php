<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $categories = Category::all();
      return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->validate(['name' => 'required|string|unique:categories|min:3',])){
        $category = new Category();
        $category->fill($request->all());
        if($category->save()){
          return redirect()->route('categoria.index')->with('msj', 'Datos correctamente guardados');
        }else{
          return redirect()->route('categoria.index')->with('msje', 'Error al guardar los datos.');
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categorium)
    {
        //
        return view('categories.show', compact('categorium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categorium)
    {
        //
        if($request->validate(['name' => 'required|string|min:3',])){
          $categorium->fill($request->all());
          if($categorium->save()){
            return redirect()->route('categoria.index')->with('msj', 'Datos correctamente actualizados');
          }else {
            return redirect()->route('categoria.index')->with('msje', 'Error al actualizar los datos.');
          }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorium)
    {
        //
        if($categorium->delete()){
          return redirect()->route('categoria.index')->with('msj', 'Registro correctamente eliminado');
        }else{
          return redirect()->route('categoria.index')->with('msje', 'Error al eliminar los datos.');
        }
    }
}
