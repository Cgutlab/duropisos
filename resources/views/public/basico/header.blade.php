<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <div class="container">
        <div class="row m-0">
            <div class="col s12 m6 l3">
                <a href="{{ URL::to($path) }}"><img src="{{ asset('img') }}/{{ $logo }}"/></a>
            </div>
            <div class="col s12 m6 l9">
                <ul class="right ul-separado m-0">
                    <li><i class="material-icons text_principal_444444">phone_in_talk</i><a class="text_principal_444444" href="tel:{{$contacto['telefono_1']}}">{{$contacto["telefono_1"]}}</a></li>
                    <li><i class="material-icons">email</i><a class="text_principal_444444" href="mailto:{{$contacto['email_1']}}">{{$contacto["email_1"]}}</a><br/><a class="text_principal_444444" href="mailto:{{$contacto['email_2']}}">{{$contacto["email_2"]}}</a></li>
                </ul>
                <ul class="right ul-separado m-0" style="margin-right:2em">
                    <li><i class="fab fa-whatsapp text_principal_444444" style="font-size:24px;"></i><a class="text_principal_444444" href="http://wa.me/{{$contacto['whatsapp']}}">{{$contacto["whatsapp"]}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--  -->
<nav class="nav">
    <div class="nav-wrapper">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="hide-on-med-and-down">
            <li><a href="{{ URL::to($path . '/empresa') }}">Empresa</a></li>
            <li><a href="{{ URL::to($path . '/productos') }}">Productos</a></li>
            <li><a href="{{ URL::to($path . '/aplicacion') }}">Aplicación</a></li>
            <li><a href="{{ URL::to($path . '/trabajos') }}">Trabajos Realizados</a></li>
            <li><a href="{{ URL::to($path . '/preguntas') }}">Preguntas Frecuentes</a></li>
            <!--<li><a href="{{ URL::to($path . '/distribuidores') }}">Distribuidores</a></li>-->
            <li><a href="{{ URL::to($path . '/ventajas') }}">Ventajas</a></li>
            <li><a href="{{ URL::to($path . '/contacto') }}">Contacto</a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="{{ URL::to($path . '/empresa') }}">Empresa</a></li>
    <li><a href="{{ URL::to($path . '/productos') }}">Productos</a></li>
    <li><a href="{{ URL::to($path . '/aplicacion') }}">Aplicación</a></li>
    <li><a href="{{ URL::to($path . '/trabajos') }}">Trabajos Realizados</a></li>
    <li><a href="{{ URL::to($path . '/preguntas') }}">Preguntas Frecuentes</a></li>
    <li><a href="{{ URL::to($path . '/distribuidores') }}">Distribuidores</a></li>
    <li><a href="{{ URL::to($path . '/ventajas') }}">Ventajas</a></li>
    <li><a href="{{ URL::to($path . '/contacto') }}">Contacto</a></li>
</ul>