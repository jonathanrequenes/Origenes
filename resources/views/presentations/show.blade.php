@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <h2 class="title text-center"><span class="deco">Editar producto</span></h2>
        @include('presentations.error')
        <div class="card-body">
            <form action="{{ route('presentacion.update', $presentacion->id) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PATCH">
              <div class="form-group">
                @csrf
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value="{{ $presentacion->name }}"/>
              </div>
              <div class="form-group">
                  <label for="description">Descripción :</label><br>
                  <textarea name="description" rows="3" cols="50">{{ $presentacion->description }}</textarea>
              </div>
              <div class="form-group">
                  <label for="price">Precio</label>
                  <input type="text" class="form-control" name="price" value="{{ $presentacion->price }}"/>
              </div>
              <div class="form-group">
                  <label for="price_on_six">Cantidad</label>
                  <input type="text" class="form-control" name="amount" value="{{ $presentacion->amount }}"/>
              </div>
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
