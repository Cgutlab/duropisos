@extends('public.main')

@section('headTitle', 'Aplicación | Duro Pisos')
@section('bodyTitle', 'Aplicación')

@section('body')
@include('public.basico.header')
<main style="padding:4em 0;">
    <div class="container">
        <fieldset class="fieldset-title">
            <legend>
                <p class="text-center text-uppercase">instructivos en video</p>
                <h4>Aplicación</h4>
            </legend>
        </fieldset>
        <div class="row">
        @foreach($aplicaciones AS $aplicacion)
            <div class="col l4 m6 s12">
                <div class="card-video">
                    <iframe style="width:100%" src="https://www.youtube.com/embed/{{$aplicacion['video']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="">
                    {!! $aplicacion["title"] !!}
                </div>
            </div>
        @endforeach
        </div>
    </div>
</main>
@include('public.basico.footer')
@endsection