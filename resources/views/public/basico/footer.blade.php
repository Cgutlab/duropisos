<footer class="page-footer footer text_principal_595959" style="background: #F2F2F2; font-size:15px;">
    <div class="container">
    <div class="row position-relative">
        <div class="col l3 m6 s12 position-absolute d-flex align-items-center justify-content-center" style="height: 100%; top:0; left:0;">
            <img src="{{ asset('img') }}/{{ $logoFooter }}"/>
        </div>
        <div class="col l4 offset-l3 m6 offset-m6 s12 espacio">
            <p class="text-uppercase" style="color:#6E6E6E; font-weight:600;">Secciones</p>
            <div class="row m-0">
                <div class="col s6">
                    <ul class="ul-separado m-0">
                        <li style="padding-left: 0;"><a href="{{ URL::to('/') }}">Inicio</a></li>
                        <li style="padding-left: 0;"><a href="{{ URL::to($path . '/empresa') }}">Empresa</a></li>
                        <li style="padding-left: 0;"><a href="{{ URL::to($path . '/aplicacion') }}">Aplicación</a></li>
                        <li style="padding-left: 0;"><a href="{{ URL::to($path . '/trabajos') }}">Trabajos Realizados</a></li>
                    </ul>
                </div>
                <div class="col s6">
                    <ul class="ul-separado m-0">
                        <li><a href="{{ URL::to($path . '/preguntas') }}">Preguntas frecuentes</a></li>
                        <!--<li><a href="{{ URL::to($path . '/distribuidores') }}">Distribuidores</a></li>-->
                        <li><a href="{{ URL::to($path . '/ventajas') }}">Ventajas</a></li>
                        <li><a href="{{ URL::to($path . '/contacto') }}">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col l2 m6 s12">
            @if(!empty($contacto["facebook"]) || !empty($contacto["instagram"]))
            <p class="text-uppercase" style="color:#6E6E6E; font-weight:600;">Seguinos en</p>
            @endif
            @if(!empty($contacto["facebook"]))
            <a href="{{$contacto['facebook']}}" style="margin-right: .4em;" target="blank" class="redes"><i class="fab fa-facebook"></i></a>
            @endif
            @if(!empty($contacto["instagram"]))
            <a href="{{$contacto['instagram']}}" target="blank" class="redes"><i class="fab fa-instagram"></i></a>
            @endif
        </div>
        <div class="col l3 m6 s12 espacio">
            <p class="text-uppercase" style="font-weight:600;">Duro pisos s.r.l.</p>
            <ul class="ul-separado">
                <li style="padding-left: 38px;"><i class="material-icons">location_on</i>{!! $domicilio !!}</li>
                <li style="padding-left: 38px;"><i class="material-icons">phone_in_talk</i><a href="tel:{{$contacto['telefono_1']}}">{{$contacto["telefono_1"]}}</a></li>
                <li style="padding-left: 38px;"><i class="material-icons">email</i><a class="" href="mailto:{{$contacto['email_1']}}">{{$contacto["email_1"]}}</a><br/><a class="" href="mailto:{{$contacto['email_2']}}">{{$contacto["email_2"]}}</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div class="footer-copyright text_principal_39373E" style="min-height: auto">
        <div class="container" style="color:#6E6E6E; font-size:11px">
            © 2019
            <a class="right" href="http://osole.es">By OSOLE</a>
        </div>
    </div>
</footer>