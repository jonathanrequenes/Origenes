@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <h2 class="title text-center"><span class="deco">Agregar presentaciones</span></h2>
        @include('presentations.error')
        <div class="card-body">
            <form method="post" action="{{ route('presentacion.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>
                <div class="form-group">
                    <label for="description">Descripción :</label><br>
                    <textarea name="description" rows="3" cols="50" value="{{ old('description') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"/>
                </div>
                <div class="form-group">
                    <label for="amount">Cantidad</label>
                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
