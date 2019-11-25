@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Una verificacion nueva ha sido enviada a tu correo electronico.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, verifica tu correo electronico, donde encontráras in link de activación.') }}
                    {{ __('Si no recibiste el correo electronico') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haz click aqui para enviarla nuevamente') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
