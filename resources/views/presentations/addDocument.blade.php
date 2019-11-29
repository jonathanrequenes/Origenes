@extends('layouts.admin')

@section('content')
@if(session()->has('msj'))
  <div class="alert alert-success" role="alert">{{session('msj')}}</div>
@endif
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <h2 class="title text-center"><span class="deco">Agregar documentacion a la presentacion.</span></h2>
        @include('presentations.error')
        <form method="post" action=" {{ route('documentPresentation', $id) }}" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="documentations">Archivos de Documentacion</label>
                <input type="file" class="form-control" name="documentations[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
