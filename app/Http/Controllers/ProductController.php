<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        foreach ($products as $key => $product) {
          $p = Product::findOrFail($product->id);
          $category=$p->category;
          $product->category = $category->name;
          $product->price = number_format($product->price, 2, ".", ",");
          $product->price_on_six = number_format($product->price_on_six, 2, ".", ",");
        }
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->validate(['name' => 'required|string|unique:products|min:3','category' => 'required','description' => 'required|string|min:3','price' => 'required|numeric','price_on_six' => 'required|numeric','alcohol_grade' => 'required|numeric','inventory' => 'required|numeric','image' => 'required|file'])){
            if($request->hasFile('image')){
              $file = $request->file('image');
              $name = time().$file->getClientOriginalName();
              $file->move(public_path().'/img/', $name);
            }
            $product = new Product();
            $product->category_id = $request->category;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->price_on_six = $request->price_on_six;
            $product->alcohol_grade = $request->alcohol_grade;
            $product->inventory = $request->inventory;
            $product->image_path = $name;
            $product->save();
            return redirect()->route('producto.index')->with('msj', 'Datos correctamente guardados');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        //
        $categories = Category::all();
        return view('products.show', compact('producto', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $producto)
    {
        if($request->validate(['name' => 'required|string|min:3','category' => 'required','description' => 'required|string|min:3','price' => 'required|numeric','price_on_six' => 'required|numeric','alcohol_grade' => 'required|numeric','inventory' => 'required|numeric','image' => 'file'])){
          if($request->hasFile('image')){
            unlink(public_path().'/img/'.$producto->image_path);
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
          }
          $producto->category_id = $request->category;
          $producto->name = $request->name;
          $producto->description = $request->description;
          $producto->price = $request->price;
          $producto->price_on_six = $request->price_on_six;
          $producto->alcohol_grade = $request->alcohol_grade;
          $producto->inventory = $request->inventory;
          if($request->hasFile('image')){
            $producto->image_path = $name;
          }
          $producto->save();
          return redirect()->route('producto.index')->with('msj', 'Datos correctamente actualizados');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $producto)
    {
        unlink(public_path().'/img/'.$producto->image_path);
        $producto->delete();
        return redirect()->route('producto.index')->with('msj', 'Registro correctamente eliminado');
    }
}
