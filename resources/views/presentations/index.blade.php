@extends('layouts.admin')

@section('content')
@if(session()->has('msj'))
  <div class="alert alert-success" role="alert">{{session('msj')}}</div>
@endif
@if(session()->has('msje'))
  <div class="alert alert-danger" role="alert">{{session('msje')}}</div>
@endif
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <input type ='button' class="btn btn-success"  value='Agregar presentacion' onclick="location.href = '{{ route('presentacion.create') }}'"/><br><br>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
                <th>Documentacion</th>
              </tr>
            </thead>
            <tbody>
              @foreach($presentations as $presentation)
              <tr>
                <td>{{ $presentation->name }}</td>
                <td>{{ $presentation->description }}</td>
                <td>$ {{ $presentation->price }}</td>
                <td>{{ $presentation->amount }}</td>
                <td><a href="{{ route('presentacion.show', $presentation->id) }}" class="btn btn-sm btn-info"> Ver/Editar</a>
                  <form method="POST" action="{{ route('presentacion.destroy', $presentation->id) }}">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                  </form>
                </td>
                <td><a href="{{ route('documentPresentation', $presentation->id) }}" class="btn btn-sm btn-info"> Documentación</a>
                <a href="{{ route('documentIndexP', $presentation->id) }}" class="btn btn-sm btn-info"> Ver documentacion.</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
