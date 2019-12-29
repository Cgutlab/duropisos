@extends('public.main')

@section('headTitle', 'Producto :: ' . $title . ' | Duro Pisos')
@section('bodyTitle', 'Producto :: ' . $title)

@section('body')
@include('public.basico.header')

<main>
    <div class="container">
        <div class="image-producto">
            <div class="row">
                <div class="col s12">
                    @if(!empty($producto))
                    <img src="{{ asset('img') }}/{{ $producto['image'] }}?<?php echo time(); ?>" alt="Producto - {{$title}}"/>
                    @endif
                </div>
            </div>
        </div>
        <div class="nav-producto">
            <div class="row">
                <div class="col s12">
                    <a class="a-link" href="{{ URL::to($path . '/productos') }}">« Volver</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6">
                    <h4 class="m-0 text-title">{{$title}}</h4>
                </div>
                <div class="col s12 l6 text-right">
                    <div class="mercadolibre">
                        @if(!empty($producto["url_mercadolibre"]))
                        <a href="{!!$producto['url_mercadolibre']!!}" target="blank"><img src="{{ asset('img/general') }}/mercadolibre.fw.png" alt="Mercadolibre"/></a>
                        @endif
                        @if(!empty($producto["url_mercadopago"]))
                        <a href="{!!$producto['url_mercadopago']!!}" target="blank"><img src="{{ asset('img/general') }}/mercadopago.fw.png" alt="Mercadopago"/></a>
                        @endif
                    </div>
                </div>
            </div>
            @if(!empty($producto["descripcion"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">descripción</p>
                </div>
                <div class="col s12 l9">{!! $producto["descripcion"] !!}</div>
            </div>
            @endif
            @if(!empty($producto["ventaja"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">ventajas</p>
                </div>
                <div class="col s12 l9 ventajas">{!! $producto["ventaja"] !!}</div>
            </div>
            @endif
            @if(!empty($producto["presentacion"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">presentación</p>
                </div>
                <div class="col s12 l9 presentacion">{!! $producto["presentacion"] !!}</div>
            </div>
            @endif
            @if(!empty($producto["textura"]) || count($producto["texturas"]) > 0)
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">texturas</p>
                </div>
                <div class="col s12 l9">
                    {!! $producto["textura"] !!}
                    <div class="colores">
                        @foreach($producto["texturas"] AS $textura)
                            <div title="{!!$textura["code"]!!} - {{$textura['name']}}" data-descripcion="{!! $textura['descripcion'] !!}" data-color="{!!$textura["code"]!!}" data-name="{!!$textura["name"]!!}">
                                <img src="{{ asset('img') }}/{{ $textura['image'] }}?<?php echo time(); ?>" alt="Textura - {{$textura['name']}}"/>
                                <p>{!!$textura["code"]!!}</p>
                                <p class="">{!!$textura["name"]!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if(!empty($producto["color"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">colores</p>
                </div>
                <div class="col s12 l9">
                    {!! $producto["color"] !!}
                    <div class="colores">
                        @foreach($producto["colores"] AS $color)
                            <div title="{!!$color["code"]!!} - {{$color['name']}}" data-descripcion="{!! $color['descripcion'] !!}" data-color="{!!$color["code"]!!}" data-name="{!!$color["name"]!!}">
                                <img src="{{ asset('img') }}/{{ $color['image'] }}?<?php echo time(); ?>" alt="Color - {{$color['name']}}"/>
                                <p>{!!$color["code"]!!}</p>
                                <p class="text-truncate">{!!$color["name"]!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</main>
@include('public.basico.footer')
@endsection