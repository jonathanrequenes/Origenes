@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <input type ='button' class="btn btn-success"  value='Agregar cerveza' onclick="location.href = '{{ route('cerveza.create') }}'"/><br><br>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Grados Alcohol</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($cervezas as $cerveza)
                <tr>
                  <td>{{ $cerveza->name }}</td>
                  <td>{{ $cerveza->price }}</td>
                  <td>{{ $cerveza->alcohol_grade }}</td>
                  <td><a href="{{ route('cerveza.show', $cerveza->id) }}" class="btn btn-sm btn-info"> Ver/Editar</a>
                    <form method="POST" action="{{ route('cerveza.destroy', $cerveza->id) }}">
                      @method("DELETE")
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
