@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card uper">
        <h2 class="title text-center"><span class="deco">Agregar categoria</span></h2>
        <div class="card-body">
            <form method="post" action="{{ route('categoria.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
