@extends('public.main')

@section('headTitle', 'Ventajas | Duro Pisos')
@section('bodyTitle', 'Ventajas')

@section('body')
@include('public.basico.header')
<main style="padding:4em 0;">
    <div class="container">
        <fieldset class="fieldset-title">
            <legend>
                <p class="text-center text-uppercase">conocé nuestras</p>
                <h4>Ventajas</h4>
            </legend>
        </fieldset>
        <div class="row ventajas">
            @foreach($ventajas AS $ventaja)
                <div class="col l4 m4 s12" style="margin: 10px 0;">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('img')}}/{{$ventaja['icon']}}" />
                        <p>{!!$ventaja["title"]!!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
@include('public.basico.footer')
@endsection