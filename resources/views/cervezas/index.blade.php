@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <input type ='button' class="btn btn-success"  value='Agregar cerveza' onclick="location.href = '{{ route('cervezaCreate') }}'"/><br><br>
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Grados Alcohol</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($cervezas as $cerveza)
                <tr>
                  <td>{{ $cerveza->name }}</td>
                  <td>{{ $cerveza->price }}</td>
                  <td>{{ $cerveza->alcohol_grade }}</td>
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
