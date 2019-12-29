@extends('public.main')

@section('headTitle', 'Bienvenido | Duro Pisos')
@section('bodyTitle', 'Bienvenido')

@section('body')
<main>
    <div class="bg_index" style="height: 100vh; margin-bottom:0;">
        <div class="d-flex align-items-center justify-content-center" style="height: inherit">
            <div class="row w-100">
                <div class="col s12 m8 l6 offset-m2 offset-l3 bg-white-o">
                    <div class="row p-3 m-0">
                        <div class="col s12 m12 l6">
                            <img class="mx-auto d-block w-100" src="{{ asset('img') }}/{{ $logo }}"/>
                            <p style="margin-bottom:0; font-size:18px; padding-top: 1.9em;" class="text-center text-uppercase text_importante">elegí un tipo de usuario</p>
                        </div>
                        <div class="col s12 m12 l6 text-center">
                            <a href="{{ route('profesional') }}" class="img-profesional">
                                <span></span>
                                <p style="margin-bottom:0;">Profesional</p>
                            </a>
                            <a href="{{ route('particular') }}" class="img-particular">
                                <span></span>
                                <p style="margin-bottom:0;">Particular</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
