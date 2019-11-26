@extends('layouts.template')

@section('content')
<div class="container section-padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="title text-center"><span class="deco">Verifica tu correo electronico.</span></h2>

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
		                <div align="center"><button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haz click aqui para enviarla nuevamente') }}</button>.</div>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
