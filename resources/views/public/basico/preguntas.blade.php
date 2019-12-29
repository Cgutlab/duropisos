@extends('public.main')

@section('headTitle', 'Preguntas frecuentes | Duro Pisos')
@section('bodyTitle', 'Preguntas frecuentes')

@section('body')
@include('public.basico.header')
<main style="padding:4em 0;">
    <div class="container">
        <fieldset class="fieldset-title">
            <legend>
                <p class="text-center text-uppercase">preguntas frecuentes</p>
                <h4>Más información</h4>
            </legend>
        </fieldset>
        <ul class="collapsible box-shadow-none m-0">
            @foreach($preguntas AS $pregunta)
                <li>
                    <div class="collapsible-header">{{$pregunta["pregunta"]}}</div>
                    <div class="collapsible-body">{!! $pregunta["respuesta"] !!}</div>
                </li>
            @endforeach
        </ul>
    </div>
</main>
@include('public.basico.footer')
@endsection