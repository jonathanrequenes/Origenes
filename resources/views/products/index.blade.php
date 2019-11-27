@extends('layouts.admin')

@section('content')
@if(session()->has('msj'))
  <div class="alert alert-success" role="alert">{{session('msj')}}</div>
@endif
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <input type ='button' class="btn btn-success"  value='Agregar producto' onclick="location.href = '{{ route('producto.create') }}'"/><br><br>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Grados de alcohol</th>
                <th>Inventario</th>
                <th>Num. Presentaciones</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->alcohol_grade }}</td>
                <td>{{ $product->inventory }}</td>
                <td>{{ $product->numPresentations }}</td>
                <td><a href="{{ route('producto.show', $product->id) }}" class="btn btn-sm btn-info"> Ver/Editar</a>
                  <form method="POST" action="{{ route('producto.destroy', $product->id) }}">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                  </form>
                </td>
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
