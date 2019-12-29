
@extends('public.main')

@section('headTitle', 'Contacto | Duro Pisos')
@section('bodyTitle', 'Contacto')

@section('body')
@include('public.basico.header')

<main>
    <!--<iframe src="https://maps.google.com/?q={{$url_map}}" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.917182925598!2d-58.541792884769585!3d-34.63153308045231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd1fb74c0be340b51!2sDuro+Pisos!5e0!3m2!1ses!2sar!4v1552323261074" style="height:380px; width: 100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="container">
        <div class="row">
            <div class="col l4 s12">
                <ul class="ul-separado">
                    <li><i class="material-icons" style="color:#002C5E">location_on</i>{!! $domicilio !!}</li>
                    <li><i class="fab fa-whatsapp text_principal_444444" style="font-size:24px;color:#002C5E"></i><a style="color:inherit" href="http://wa.me/{{$contacto['whatsapp']}}">{{$contacto["whatsapp"]}}</a></li>
                    <li><i class="material-icons" style="color:#002C5E">phone_in_talk</i><a style="color:inherit" href="tel:{{$contacto['telefono_1']}}">{{$contacto["telefono_1"]}}</a></li>
                    <li><i class="material-icons" style="color:#002C5E">email</i><a style="color:inherit" href="mailto:{{$contacto["email_1"]}}">{{$contacto['email_1']}}</a><br/><a style="color:inherit" href="mailto:{{$contacto['email_2']}}">{{$contacto["email_2"]}}</a></li>
                </ul>
            </div>
            <div class="col l8 s12">
                <form method="POST" action="{{route('mail')}}">
                    {{ csrf_field() }}
                    @method('POST')
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <input id="" type="text" class="validate" name="nombre" required="true" placeholder="Nombre" tabindex="1">
                        </div>
                        <div class="col l6 m6 s12">
                            <input id="" type="email" class="validate" name="email" required="true" placeholder="Email" tabindex="3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <input id="" type="text" class="validate" name="apellido" required="true" placeholder="Apellido" tabindex="2">
                        </div>
                        <div class="col l6 m6 s12">
                            <input id="" type="text" class="validate" name="telefono" required="true" placeholder="Teléfono" tabindex="4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <textarea placeholder="Mensaje" id="mensaje" name="mensaje" tabindex="5" required="true" class="validate materialize-textarea"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="g-recaptcha" data-sitekey="6LeDa5YUAAAAACnCJJE6NC28LIZ6kqNY7kywhrmB"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p class="m-0">
                                <label>
                                    <input type="checkbox" name="is_ok">
                                    <span>Acepto los términos y condiciones de privacidad</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col l6 s12">
                            <button class="btn-solo">enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('public.basico.footer')
@endsection