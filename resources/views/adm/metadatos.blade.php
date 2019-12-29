@extends('adm.main')

@section('headTitle', $seccion . ' | Duro pisos')
@section('bodyTitle', $seccion)

@section('body')
<main>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Metadato<button onclick="metadato()" class="btn right"><i class="material-icons">send</i></button></span>
                <h4>Descripción:</h4>
                <p class="m-0">{!! $metadato["description"] !!}</p>
                <hr/>
                <h4>Metadatos:</h4>
                <p class="m-0">{!! $metadato["metadato"] !!}</p>
            </div>
        </div>
    </div>
</main>
@endsection