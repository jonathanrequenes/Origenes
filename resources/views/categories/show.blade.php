@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card uper">
        <h2 class="title text-center"><span class="deco">Editar categoria</span></h2>
        <div class="card-body">
          <form action="{{ route('categoria.update', $categorium->id) }}" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
              @csrf
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name" value="{{ $categorium->name }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
