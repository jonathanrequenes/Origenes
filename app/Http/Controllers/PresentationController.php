<?php

namespace App\Http\Controllers;

use App\Presentation;
use Illuminate\Http\Request;

class PresentationController extends Controller
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
        $presentations = Presentation::all();
        foreach ($presentations as $key => $presentation) {
          $presentation->price = number_format($presentation->price, 2, ".", ",");
        }
        return view('presentations.index', compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presentations.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->validate(['name' => 'required|string|unique:presentations|min:3', 'description' => 'required|string|min:3', 'price' => 'required|numeric', 'amount' => 'required|numeric'])){
          $presentation = new Presentation();
          $presentation->fill($request->all());
          if($presentation->save()){
            return redirect()->route('presentacion.index')->with('msj', 'Datos correctamente guardados');
          }else{
            return redirect()->route('presentacion.index')->with('msje', 'Eroror al guardar los datos.');
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentacion)
    {
        return view('presentations.show', compact('presentacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentation $presentacion)
    {
        if($request->validate(['name' => 'required|string|min:3', 'description' => 'required|string|min:3', 'price' => 'required|numeric', 'amount' => 'required|numeric'])){
          $presentacion->fill($request->all());
          if($presentacion->save()){
            return redirect()->route('presentacion.index')->with('msj', 'Datos correctamente actualizados');
          }else{
            return redirect()->route('presentacion.index')->with('msje', 'Eroror al guardar los datos.');
          }
        }
    }

    public function document(Presentation $presentacion)
    {
        $id=$presentacion->id;
        return view('presentations.addDocument', compact('id'));
    }

    public function indexDocumentation($presentacion_id)
    {
        $presentacion = Presentation::find($presentacion_id);
        $documentations = $presentacion->documentations;
        return view('presentations.indexDocument', compact('documentations'));
    }

    public function storeDocumentation(Request $request, $presentation_id)
    {
        if($request->validate(['documentations' => 'required'])){
          if($request->hasFile('documentations')){
            $files=$request->file('documentations');
            $presentation = Presentation::find($presentation_id);
            foreach($files as $file){
              $name = time().$file->getClientOriginalName();
              $file->move(public_path().'/documentations/', $name);

              if(!($presentation->documentations()->create(['path' => $name]))){
                return redirect()->route('producto.index')->with('msje', 'Error en agregado de documentacion.');
              }
            }
          }
          return redirect()->route('presentacion.index')->with('msj', 'Documentación agregada correctamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentacion)
    {
        $presentacion->delete();
        return redirect()->route('presentacion.index')->with('msj', 'Registro correctamente eliminado');
    }

    public function deleteDocumentation(Documentation $document)
    {
        unlink(public_path().'/documentations/'.$document->path);
        if($document->delete()){
          return redirect()->route('presentacion.index')->with('msj', 'Documentación correctamente eliminada');
        }else{
          return redirect()->route('presentacion.index')->with('msje', 'Error en eliminacion de documentacion.');
        }
    }
}
