@extends('public.main')

@section('headTitle', 'Productos | Duro Pisos')
@section('bodyTitle', 'Productos')

@section('body')
@include('public.basico.header')
<main style="padding:4em 0;">
    <div class="container">
        <fieldset class="fieldset-title">
            <legend>
                <p class="text-center text-uppercase">conocé nuestros</p>
                <h4>Productos</h4>
            </legend>
        </fieldset>

        <div class="row trabajos" style="padding-top:2em;">
            @foreach($familias AS $familia)
                <a href="{!!URL::to('particular/productos/')!!}/{{$familia['url']}}" class="col l4 m4 s12 text_principal_444444">
                    <img src="{{asset('img')}}/{{$familia['image']}}?<?php echo time(); ?>" />
                    <p class="text-center" style="padding-top:1em;">{!!$familia["title"]!!}</p>
                </a>
            @endforeach
        </div>
    </div>
</main>
@include('public.basico.footer')
@endsection