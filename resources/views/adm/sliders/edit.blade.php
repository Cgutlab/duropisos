@extends('adm.main')

@section('headTitle', 'Editar Slider | Duro pisos')
@section('bodyTitle', 'Editar Slider')

@section('body')
<main>
    <div class="">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Slider<button onclick="addRegistro('slider{{$section}}')" class="btn right"><i class="fas fa-plus"></i></button></span>
                <table>
                    <thead>
                        <th>Imagen</th>
                        <th>Texto</th>
                        <th>Orden</th>
                        <th style="width:150px">Acciones</th>
                    </thead>
                    <tbody>
                        @if(count($sliders) != 0)
                            @foreach($sliders as $slider)
                                <tr data-id="{{$slider['id']}}">
                                    <td><img src="{{ asset('img/').'/'.$slider['image'] }}?t=<?php echo time(); ?>" style="height:50px;" /></td>
                                    <td>{!! $slider["texto"] !!}</td>
                                    <td class="text-center">{{$slider["order"]}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="edit('slider',{{$slider['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger" onclick="erase('slider',{{$slider['id']}})"><i class="material-icons">delete</i></button>
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
</main>

<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	// 
</script>
@endsection