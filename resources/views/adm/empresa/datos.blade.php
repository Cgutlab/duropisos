@extends('adm.main')

@section('headTitle', 'Empresa | Duro pisos')
@section('bodyTitle', 'Empresa')

@section('body')
<main>
    <div class="row">
        <div class="col s12 l6">
            <form>
                <fieldset>
                    <legend><button type="button" onclick="editEmpresa('data')" class="btn">Domicilio <i class="material-icons right">send</i></button></legend>
                    @if(empty($empresaData))
                    <div class="row">
                        <div class=" col s12">
                            <p style="margin-bottom:0">SIN DATOS</p>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class=" col s12">
                            <label for="domicilio">Domicilio</label>
                            <p style="margin-bottom:0">{{$empresaData["direccion"]}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col s6">
                            <label for="provincia_id">Provincia</label>
                            <p style="margin-bottom:0">{{$empresaData["provincia_id"]}}</p>
                        </div>
                        <div class=" col s6">
                            <label for="localidad_id">Localidad</label>
                            <p style="margin-bottom:0">{{$empresaData["localidad_id"]}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col s6">
                            <label>Logotipo</label>
                            <img style="width:100%; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/{{$empresaData['logo_principal']}}" />
                        </div>
                        <div class=" col s6">
                            <label>Logotipo footer</label>
                            <img style="width:100%; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/{{$empresaData['logo_footer']}}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col s6">
                            <label>Favicon</label>
                            <img style="width:96px; display:block; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/{{$empresaData['favicon']}}" />
                        </div>
                    </div>
                    @endif
                </fieldset>
            </form>
        </div>
        <div class="col s12 l6">
            <form>
                <fieldset>
                    <legend><button type="button" onclick="editEmpresa('contacto')" class="btn">Contacto <i class="material-icons right">send</i></button></legend>
                    @if(empty($empresaContacto))
                    <div class="row">
                        <div class=" col s12">
                            <p style="margin-bottom:0">SIN DATOS</p>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class=" col s12">
                            <label>Email 1</label>
                            @if(!empty($empresaContacto["email_1"]))
                                <p style="margin-bottom:0">{{$empresaContacto["email_1"]}}</p>
                            @else
                                <p style="margin-bottom:0">SIN DATO</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col s12">
                            <label>Email 2</label>
                            @if(!empty($empresaContacto["email_2"]))
                                <p style="margin-bottom:0">{{$empresaContacto["email_2"]}}</p>
                            @else
                                <p style="margin-bottom:0">SIN DATO</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col s12 l6">
                            <label>Teléfono</label>
                            @if(!empty($empresaContacto["telefono_1"]))
                                <p style="margin-bottom:0">{{$empresaContacto["telefono_1"]}}</p>
                            @else
                                <p style="margin-bottom:0">SIN DATO</p>
                            @endif
                        </div>
                        <div class=" col s12 l6">
                            <label>WhatsApp</label>
                            @if(!empty($empresaContacto["whatsapp"]))
                                <p style="margin-bottom:0">{{$empresaContacto["whatsapp"]}}</p>
                            @else
                                <p style="margin-bottom:0">SIN DATO</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class=" col s6">
                            <label>Facebook</label>
                            @if(!empty($empresaContacto["facebook"]))
                                <p class="text-truncate" style="margin-bottom:0"><a href="{{$empresaContacto['facebook']}}" target="blank">{!!$empresaContacto["facebook"]!!}</a></p>
                            @else
                                <p style="margin-bottom:0">SIN DATO</p>
                            @endif
                        </div>
                        <div class=" col s6">
                            <label>Instagram</label>
                            @if(!empty($empresaContacto["instagram"]))
                                <p class="text-truncate" style="margin-bottom:0"><a href="{{$empresaContacto['instagram']}}" target="blank">{!!$empresaContacto["instagram"]!!}</a></p>
                            @else
                                <p style="margin-bottom:0">SIN DATO</p>
                            @endif
                        </div>
                    </div>
                    @endif
                </fieldset>
            </form>
        </div>
    </div>
    <script>
        window.provincias = {!! json_encode($provincias) !!};
    </script>
</main>
@endsection