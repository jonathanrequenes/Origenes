@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <div class="card-header">
          Agregar cerveza
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('cerveza.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="description">Descripción :</label><br>
                    <textarea name="description" rows="3" cols="50"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="text" class="form-control" name="price"/>
                </div>
                <div class="form-group">
                    <label for="price_on_six">Precio (Six)</label>
                    <input type="text" class="form-control" name="price_on_six"/>
                </div>
                <div class="form-group">
                    <label for="alcohol_grade">Grado de Alcohol</label>
                    <input type="text" class="form-control" name="alcohol_grade"/>
                </div>
                <div class="form-group">
                    <label for="alcohol_grade">Inventario</label>
                    <input type="text" class="form-control" name="inventory"/>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
