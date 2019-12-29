@extends('public.main')

@section('headTitle', 'Home | Duro Pisos')
@section('bodyTitle', 'Home')

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
    <!-- FAMILIA DE PRODUCTOS -->

    <article class="wrapper-familias">
        <div class="row familias">
            @foreach($familias AS $familia)
            <a href="{!!URL::to($path . '/productos/')!!}/{{$familia['url']}}" class="col l3 m6 s12 justify-content-center align-items-center">
                <img src="{{asset('img')}}/{{$familia['image']}}?<?php echo time(); ?>" />
                <p>{!! $familia["title"] !!}</p>
            </a>
            @endforeach
        </div>
    </article>
    <article class="wrapper-empresa-home bg-F9F9F9">
        <div class="container">
            <div class="row m-0">
                <div class="col l6 s12">
                    <img src="{{asset('img')}}/{{$data['image_resume']}}?<?php echo time(); ?>" />
                </div>
                <div class="col l6 s12">
                    <p class="m-0 text-uppercase a-link" style="font-size: 18px">{{$data["title_resume"]}}</p>
                    <h4 class="text_importante" style="margin-top:0;font-size: 38px; margin-left: -4px;">{{$data["subtitle_resume"]}}</h4>
                    <div class="text_principal_595959">{!!$data['text_resume']!!}</div>
                    <a href="{{ URL::to($path . '/empresa') }}" class="btn-solo">nuestra empresa</a>
                </div>
            </div>
        </div>
    </article>

        <article class="wrapper-servicio">
        <span></span>
        <div class="container">
            <div class="row m-0">
                <p class="text-uppercase m-0 text-center">servicio integral</p>
                <h4 style="margin-top:0; margin-bottom:1.3em" class="text-center">Garantía y respaldo</h4>
                <div class="row servicios">
                    @foreach($servicios AS $servicio)
                    <div class="col s12 l4 align-items-center justify-content-center">
                        <img src="{{asset('img')}}/{{$servicio['icon']}}?<?php echo time(); ?>" />
                        <p>{!!$servicio["title"]!!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
</main>

@include('public.basico.footer')
@endsection
<!-- Servicio -->