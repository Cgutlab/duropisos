@extends('adm.main')

@section('headTitle', $seccion . ' | Duro pisos')
@section('bodyTitle', $seccion)

@section('body')
<main>
    
    @switch($seccion)
        @case("ventaja")
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Ventajas<button onclick="addRegistro('ventaja')" class="btn right"><i class="fas fa-plus"></i></button></span>
                </div>
                <div class="card-content table">
                    <table>
                        <thead>
                            <th>Ícono</th>
                            <th>Título</th>
                            <th>Orden</th>
                            <th style="width:150px">Acciones</th>
                        </thead>
                        <tbody>
                            @if(count($ventajas) != 0)
                                @foreach($ventajas as $ventaja)
                                    <tr data-id="{{$ventaja['id']}}">
                                        <td><img src="{{ asset('img/').'/'.$ventaja['icon'] }}" style="height:50px;" /></td>
                                        <td>{{$ventaja["title"]}}</td>
                                        <td class="text-center">{{$ventaja["order"]}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="edit('ventaja',{{$ventaja['id']}})"><i class="material-icons">create</i></button>
                                            <button type="button" class="btn btn-danger" onclick="erase('ventaja',{{$ventaja['id']}})"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="vacio">
                                    <td colspan="4">SIN DATOS</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @break;
        @case("pregunta")
        <div class="card">
            <div class="card-content">
                <span class="card-title">Preguntas<button onclick="addRegistro('pregunta')" class="btn right"><i class="fas fa-plus"></i></button></span>
            </div>
            <div class="card-content table">
                <table>
                    <thead>
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th>Orden</th>
                        <th style="width:150px">Acciones</th>
                    </thead>
                    <tbody>
                        @if(count($preguntas) != 0)
                            @foreach($preguntas as $pregunta)
                                <tr data-id="{{$pregunta['id']}}">
                                    <td>{{$pregunta["pregunta"]}}</td>
                                    <td>{{$pregunta["respuesta"]}}</td>
                                    <td class="text-center">{{$pregunta["order"]}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="edit('pregunta',{{$pregunta['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger" onclick="erase('pregunta',{{$pregunta['id']}})"><i class="material-icons">delete</i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="vacio">
                                <td colspan="4">SIN DATOS</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @break;
        @case("aplicacion")
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Aplicaciones<button onclick="addRegistro('aplicacion')" class="btn right"><i class="fas fa-plus"></i></button></span>
                </div>
                <div class="card-content table">
                    <table>
                        <thead>
                            <th>Link</th>
                            <th>Título</th>
                            <th>Orden</th>
                            <th style="width:150px">Acciones</th>
                        </thead>
                        <tbody>
                            @if(count($aplicaciones) != 0)
                                @foreach($aplicaciones as $aplicacion)
                                    <tr data-id="{{$aplicacion['id']}}">
                                        <td><a href="https://www.youtube.com/watch?v={{ $aplicacion['video'] }}" target="blank">https://www.youtube.com/watch?v={{ $aplicacion['video'] }}</a></td>
                                        <td>{{$aplicacion["title"]}}</td>
                                        <td class="text-center">{{$aplicacion["order"]}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="edit('aplicacion',{{$aplicacion['id']}})"><i class="material-icons">create</i></button>
                                            <button type="button" class="btn btn-danger" onclick="erase('aplicacion',{{$aplicacion['id']}})"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="vacio">
                                    <td colspan="4">SIN DATOS</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @break;
        @case("trabajo")
        <div class="card">
            <div class="card-content">
                <span class="card-title">Trabajos realizados<button onclick="addRegistro('trabajo')" class="btn right"><i class="fas fa-plus"></i></button></span>
            </div>
            <div class="card-content table">
                <table class="striped">
                    <thead>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Familia</th>
                        <th>Tipo</th>
                        <th>Orden</th>
                        <th style="width:150px">Acciones</th>
                    </thead>
                    <tbody>
                        @if(count($trabajos) != 0)
                            @foreach($trabajos as $trabajo)
                                <tr data-id="{{$trabajo['id']}}">
                                    <td><img src="{{ asset('img/').'/'.$trabajo['image'] }}" style="height:50px;" /></td>
                                    <td>{{$trabajo["title"]}}</td>
                                    <td>{{$familias[$trabajo["pfamilia_id"]]}}</td>
                                    <td>{{$tipo[$trabajo["is_profesional"]."".$trabajo["is_particular"]]}}</td>
                                    <td class="text-center">{{$trabajo["order"]}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="edit('trabajo',{{$trabajo['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger" onclick="erase('trabajo',{{$trabajo['id']}})"><i class="material-icons">delete</i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="vacio">
                                <td colspan="6">SIN DATOS</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            window.familias = {!! json_encode($familias) !!};
        </script>
        @break;
    @endswitch
</main>
@endsection