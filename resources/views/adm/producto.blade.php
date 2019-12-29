@extends('adm.main')

@section('headTitle', 'Productos | Duro pisos')
@section('bodyTitle', 'Productos')

@section('body')
<main>
    @switch($tipo)
        @case('familia')
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Familia de productos<button class="btn right" onclick="addRegistro('pfamilia')"><i class="material-icons">add_circle</i></button></span>
                    </div>
                    <div class="card-content table">
                        <table class="striped">
                            <thead>
                                <th>Imagen</th>
                                <th>Título</th>
                                <th class="text-center">Orden</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                                @if(count($familias) != 0)
                                    @foreach($familias as $familia)
                                        <tr data-id="{{$familia['id']}}">
                                            <td><img src="{{ asset('img/').'/'.$familia['image'] }}" style="height:50px;" /></td>
                                            <td>{{$familia["title"]}}</td>
                                            <td class="text-center">{{$familia["order"]}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" onclick="edit('pfamilia',{{$familia['id']}})"><i class="material-icons">create</i></button>
                                                <button type="button" class="btn btn-danger" onclick="erase('pfamilia',{{$familia['id']}})"><i class="material-icons">delete</i></button>
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
        @case('uno')
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Productos<button onclick="addRegistro('producto')" class="btn right"><i class="fas fa-plus"></i></button></span>
                </div>
                <div class="card-content table">
                    <table class="striped">
                        <thead>
                            <th>Código</th>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Familia</th>
                            <th class="text-center">Orden</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @if(count($productos) != 0)
                            @foreach($productos as $producto)
                                <tr data-id="{{$producto['id']}}">
                                    <td>{{$producto["codigo"]}}</td>
                                    <td><img src="{{ asset('img/').'/'.$producto['image'] }}" style="height:50px;" /></td>
                                    <td>{{$producto["name"]}}</td>
                                    <td>{{$familias[$producto["pfamilia_id"]]}}</td>
                                    <td class="text-center">{{$producto["order"]}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="edit('producto',{{$producto['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger" onclick="erase('producto',{{$producto['id']}})"><i class="material-icons">delete</i></button>
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
            @break;
    @endswitch
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.familias = {!! json_encode($familias) !!};
</script>
@endsection