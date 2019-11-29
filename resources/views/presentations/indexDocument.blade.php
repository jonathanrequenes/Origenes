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
          <table class="table">
            <thead>
              <tr>
                <th>Archivo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($documentations as $document)
              <tr>
                <td>{{ $document->path }}</td>
                <td><a href="{{ asset('documentations/'.$document->path) }}" target="_blank" class="btn btn-sm btn-info">Ver/Descargar</a>
                  <form method="POST" action="{{ route('deleteDocument', $document->id) }}">
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
