<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Presentation;
use App\Product_Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
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
        $numP = 0;
        $products = Product::all();
        foreach ($products as $key => $product) {
          $p = Product::findOrFail($product->id);
          $category=$p->category;
          $presentations=$p->presentations;
          $product->category = $category->name;
          foreach ($presentations as $key => $presentations) {
            $numP++;
          }
          $product->numPresentations = $numP;
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
        $categories = Category::all();
        $presentations = Presentation::all();
        return view('products.form', compact('categories', 'presentations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->validate(['name' => 'required|string|unique:products|min:3','category' => 'required','description' => 'required|string|min:3', 'alcohol_grade' => 'required|numeric', 'inventory' => 'required|numeric','presentations' => 'required', 'image' => 'required|file'])){
            if($request->hasFile('image')){
              $file = $request->file('image');
              $name = time().$file->getClientOriginalName();
              $file->move(public_path().'/img/', $name);
            }
            $presentations = $request->presentations;
            $product = new Product();
            $product->category_id = $request->category;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->alcohol_grade = $request->alcohol_grade;
            $product->inventory = $request->inventory;
            $product->image_path = $name;
            $product->save();
            $id = $product->id;
            foreach ($presentations as $key => $presentation) {
              $p_presentation = new Product_Presentation();
              $p_presentation->product_id = $id;
              $p_presentation->presentation_id = $presentation;
              $p_presentation->save();
            }
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
        $p_presentations = $producto->presentations;
        $p_presentationsArray = array();

        foreach ($p_presentations as $key => $p) {
          array_push($p_presentationsArray, $p->id);
        }
        $presentations = Presentation::whereNotIn('id', $p_presentationsArray)->get();
        return view('products.show', compact('producto', 'categories', 'presentations', 'p_presentations'));
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
        if($request->validate(['name' => 'required|string|min:3','category' => 'required','description' => 'required|string|min:3', 'alcohol_grade' => 'required|numeric', 'inventory' => 'required|numeric', 'presentations' => 'required', 'image' => 'file'])){
          if($request->hasFile('image')){
            unlink(public_path().'/img/'.$producto->image_path);
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
          }
          $presentations = $request->presentations;
          $producto->category_id = $request->category;
          $producto->name = $request->name;
          $producto->description = $request->description;
          $producto->alcohol_grade = $request->alcohol_grade;
          $producto->inventory = $request->inventory;
          if($request->hasFile('image')){
            $producto->image_path = $name;
          }
          $producto->save();
          Product_Presentation::where('product_id', $producto->id)->delete();
          foreach ($presentations as $key => $presentation) {
            $p_presentation = new Product_Presentation();
            $p_presentation->product_id = $producto->id;
            $p_presentation->presentation_id = $presentation;
            $p_presentation->save();
          }
          return redirect()->route('producto.index')->with('msj', 'Datos correctamente actualizados');
        }
    }

    public function document(Product $producto)
    {
        $id=$producto->id;
        return view('products.addDocument', compact('id'));
    }

    public function indexDocumentation($producto_id)
    {
        $producto = Product::find($producto_id);
        $documentations = $producto->documentations;
        return view('products.indexDocument', compact('documentations'));
    }

    public function storeDocumentation(Request $request, $product_id)
    {
      if($request->validate(['documentations' => 'required'])){
        if($request->hasFile('documentations')){
          $files=$request->file('documentations');
          $product = Product::find($product_id);
          foreach($files as $file){
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/documentations/', $name);

            $product->documentations()->create(['path' => $name]);
          }
        }
        return redirect()->route('producto.index')->with('msj', 'Documentación agregada correctamente.');
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
        Product_Presentation::where('product_id', $producto->id)->delete();
        $producto->delete();
        return redirect()->route('producto.index')->with('msj', 'Registro correctamente eliminado');
    }
}
