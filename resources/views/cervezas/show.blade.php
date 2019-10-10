@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <div class="card-header">
          Editar cerveza
        </div>
        <div class="card-body">
          <form action="{{ route('cerveza.update', $cerveza->id) }}" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                    @csrf
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ $cerveza->name }}"/>
                </div>
                <div class="form-group">
                    <label for="description">Descripción :</label><br>
                    <textarea name="description" rows="3" cols="50">{{ $cerveza->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="text" class="form-control" name="price" value="{{ $cerveza->price }}"/>
                </div>
                <div class="form-group">
                    <label for="price_on_six">Precio (Six)</label>
                    <input type="text" class="form-control" name="price_on_six" value="{{ $cerveza->price_on_six }}"/>
                </div>
                <div class="form-group">
                    <label for="alcohol_grade">Grado de Alcohol</label>
                    <input type="text" class="form-control" name="alcohol_grade" value="{{ $cerveza->alcohol_grade }}"/>
                </div>
                <div class="form-group">
                    <label for="alcohol_grade">Inventario</label>
                    <input type="text" class="form-control" name="inventory" value="{{ $cerveza->inventory }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
