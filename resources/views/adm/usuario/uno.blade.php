@extends('adm.main')

@section('headTitle', 'Mis datos | Duro pisos')
@section('bodyTitle', 'Mis datos')

@section('body')
<main>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <h4 style="text-align: center">Datos de acceso</h4>
                <div class="row">
                    <div class="col s6" style="text-align:right">
                        USUARIO
                    </div>
                    <div class="col s6 text-truncate">
                        {{$usuario["username"]}}
                    </div>
                </div>
                <div class="row">
                    <div class="col s6" style="text-align:right">
                        NOMBRE
                    </div>
                    <div class="col s6 text-truncate">
                        {{$usuario["name"]}}
                    </div>
                </div>
                <div class="row">
                    <div class="col s6" style="text-align:right">
                        TIPO
                    </div>
                    <div class="col s6 text-truncate">
                        {!!($usuario["is_admin"] ? "Administrador" : "Usuario")!!}
                    </div>
                </div>
                <div class="row" style="margin-bottom:0; text-align: center;">
                    <div class="col s12">
                        <button onclick="editUser()" class="btn">Cambiar datos <i class="material-icons right">person</i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection