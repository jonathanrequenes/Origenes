@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <h2 class="title text-center"><span class="deco">Agregar productos</span></h2>
        @include('products.error')
        <div class="card-body">
            <form method="post" action="{{ route('producto.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>
                <div class="form-group">
                    <label for="name">Categoria:</label>
                    <div class="row">
                      <div class="col-md-3">
                        <select  name="category"
                          class="form-control">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
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
                          @foreach($presentations as $presentation)
                          <option value="{{$presentation->id}}">{{$presentation->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descripción :</label><br>
                    <textarea name="description" rows="3" cols="50">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="alcohol_grade">Grado de Alcohol</label>
                    <input type="text" class="form-control" name="alcohol_grade" value="{{ old('alcohol_grade') }}"/>
                </div>
                <div class="form-group">
                    <label for="inventory">Inventario</label>
                    <input type="text" class="form-control" name="inventory" value="{{ old('inventory') }}"/>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image"/>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
