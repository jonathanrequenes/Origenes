@extends('layouts.admin')

@section('content')
<div class="container section-padding">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <input type ='button' class="btn btn-success"  value='Agregar categoria' onclick="location.href = '{{ route('categoria.create') }}'"/><br><br>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $category->name }}</td>
                  <td><a href="{{ route('categoria.show', $category->id) }}" class="btn btn-sm btn-info"> Ver/Editar</a>
                    <form method="POST" action="{{ route('categoria.destroy', $category->id) }}">
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
