@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <h2 class="title text-center"><span class="deco">Editar producto</span></h2>
        @include('products.error')
        <div class="card-body">
            <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PATCH">
              <div class="form-group">
                @csrf
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value="{{ $producto->name }}"/>
              </div>
              <div class="form-group">
                  <label for="name">Categoria:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select  name="category"
                        class="form-control">
                        @foreach($categories as $category)
                        @if($category->id == $producto->category_id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="name">Presentaciones:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select  name="presentations[]"
                        class="form-control" multiple>
                        @foreach($p_presentations as $p)
                        <option value="{{$p->id}}" selected>{{$p->name}}</option>
                        @endforeach
                        @foreach($presentations as $presentation)
                        <option value="{{$presentation->id}}">{{$presentation->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="description">Descripción :</label><br>
                  <textarea name="description" rows="3" cols="50">{{ $producto->description }}</textarea>
              </div>
              <div class="form-group">
                  <label for="alcohol_grade">Grado de Alcohol</label>
                  <input type="text" class="form-control" name="alcohol_grade" value="{{ $producto->alcohol_grade }}"/>
              </div>
              <div class="form-group">
                  <label for="inventory">Inventario</label>
                  <input type="text" class="form-control" name="inventory" value="{{ $producto->inventory }}"/>
              </div>
              <img src="{{ asset('img/'.$producto->image_path) }}" class="img-thumbnail" style="width:20%;">
              <div class="form-group">
                  <label for="image">Imagen Actual</label>
                  <input type="file" name="image"/>
              </div>
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
