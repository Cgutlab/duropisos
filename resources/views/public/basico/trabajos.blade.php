@extends('public.main')

@section('headTitle', 'Trabajos realizados | Duro Pisos')
@section('bodyTitle', 'Trabajos realizados')

@section('body')
@include('public.basico.header')
<main style="padding:4em 0;">
    <div class="container">
        <fieldset class="fieldset-title">
            <legend>
                <p class="text-center text-uppercase">trabajos realizados</p>
                <h4>Proyectos</h4>
            </legend>
        </fieldset>
        <div class="row tipos">
            <div class="col s12">
                <a href="#" data-tipo="0" class="activo">Todos</a>
                @foreach($familias AS $k => $v)
                    <a href="#" data-tipo="{{$k}}">{{$v}}</a>
                @endforeach
            </div>
        </div>
        <div class="row trabajos" style="padding-top:2em;">
            @foreach($trabajos AS $trabajo)
                <div class="col l4 m6 s12" data-tipo="{{$trabajo['pfamilia_id']}}" data-profesional="{{$trabajo['is_profesional']}}" data-particular="{{$trabajo['is_particular']}}">
                    <img class="materialboxed" src="{{asset('img')}}/{{$trabajo['image']}}" />
                    <p>{!!$trabajo["title"]!!}</p>
                </div>
            @endforeach
        </div>
    </div>
</main>
@include('public.basico.footer')
@endsection