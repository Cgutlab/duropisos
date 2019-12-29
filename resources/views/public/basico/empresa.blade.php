@extends('public.main')

@section('headTitle', 'Empresa | Duro Pisos')
@section('bodyTitle', 'Empresa')

@section('body')
@include('public.basico.header')
<main>
    <!-- SLIDER -->
    
    <div class="carousel carousel-slider center">
        @foreach($sliders AS $slider)
        <div class="carousel-item" style="background-image: url({{asset('img')}}/{{$slider['image']}}?t=<?php echo time() ?>); background-position: top center; background-repeat: no-repeat; background-size: cover;" href="#{{$slider['id']}}!">
            <div class="container">
                <div>
                    {!! $slider["texto"] !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <article class="wrapper-empresa-home">
        <div class="container">
            <div class="row m-0">
                <div class="col l6 s12">
                    <img src="{{asset('img')}}/{{$data['image']}}" />
                </div>
                <div class="col l6 s12">
                    <p class="m-0 text-uppercase">{{$data["title"]}}</p>
                    <h4 class="text_importante" style="margin-top:0">{{$data["subtitle"]}}</h4>
                    {!!$data['text']!!}
                </div>
            </div>
        </div>
    </article>
</main>
@include('public.basico.footer')
@endsection