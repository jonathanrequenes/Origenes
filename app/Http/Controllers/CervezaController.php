<?php

namespace App\Http\Controllers;

use App\Cerveza;
use Illuminate\Http\Request;

class CervezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cervezas = Cerveza::all();
        return view('cervezas.index', compact('cervezas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cervezas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cerveza = new Cerveza();
        $cerveza->fill($request->all());
        $cerveza->save();
      return redirect('/cervezas')->with('success', 'Cerveza agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function show(Cerveza $cerveza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function edit(Cerveza $cerveza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cerveza $cerveza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cerveza $cerveza)
    {
        //
    }
}
