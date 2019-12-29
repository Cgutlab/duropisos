@extends('adm.main')

@section('headTitle', 'Usuarios | Duro pisos')
@section('bodyTitle', 'Usuarios')

@section('body')
<main>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Usuarios del sistema<button onclick="addRegistro('usuario')" class="btn right"><i class="fas fa-plus"></i></button></span>
            </div>
            <div class="card-content table">
                <table>
                    <thead>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Nivel</th>
                        <th style="width:150px">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr data-id="{{$usuario['id']}}">
                                <td>{{$usuario["name"]}}</td>
                                <td>{{$usuario["username"]}}</td>
                                <td>{!! ($usuario["is_admin"] ? "Administrador" : "Usuario") !!}</td>
                                <td class="text-center">
                                    @if(Auth::user()["id"] != $usuario["id"])
                                        <button type="button" class="btn btn-primary" onclick="edit('usuario',{{$usuario['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger" onclick="erase('usuario',{{$usuario['id']}})"><i class="material-icons">delete</i></button>
                                    @else
                                        <a href="{{ route('usuario', ['seccion' => 'datos']) }}">Ir a DATOS DE USUARIO</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection