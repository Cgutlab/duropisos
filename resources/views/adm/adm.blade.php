{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DuroPisos :: Administración</title>

        <!-- <Fonts> -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,800,900" rel="stylesheet">
        <!-- </Fonts> -->
        <!-- <Styles> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <!-- </Styles> -->
    </head>
    <body>
        <div>
            
            <div id="nav-mobile" class="side-nav fixed col s3 z-depth-1" style="padding: 0; height: 100%; overflow-y: auto; position: fixed; background-color:#ededed;" role="navigation">
                <img class="sidenav-img" src="{{ asset('img/logo/logo.png') }}">
                
                <ul class="collapsible z-depth-0">
                    <li class="active">
                        <div class="collapsible-header"><i class="material-icons">home</i>Home</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('slider.create', ['seccion' => 'home']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">home</i>Empresa</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">home</i>Productos</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">home</i>Aplicación</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <p class="logout"><a class="dropdown-trigger" href="{{route('adm.logout')}}" data-target="dropdown1">Cerrar Sesión</a></p>
            </div>
            
        </div>
        <!-- <Script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <script src="{{ asset('js/materialize.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- </Script> -->
        <script>
            M.AutoInit();
        </script>
    </body>
</html> --}}


@extends('adm.main')

@section('headTitle', 'Home | Duro Pisos')
@section('bodyTitle', 'Home')

@section('body')
<main>
    
    <div class="row" style="height: 100vh; margin-bottom:0;">
        <div class="d-flex" style="height: inherit">
            <h3 class="text-bienvenido">Bienvenido</h3>
        </div>
    </div>
</main>

<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	// CKEDITOR.replace('titulo');
	// CKEDITOR.replace('subtitulo');
	// CKEDITOR.config.width = '100%';
</script>
@endsection