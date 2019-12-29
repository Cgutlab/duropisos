@extends('adm.main')

@section('headTitle', 'Crear Slider | Duro pisos')
@section('bodyTitle', 'Crear Slider')

@section('body')
<main>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <form action="">
                    <div class="row">
                        <div class="col s12">
                            <label style="font-size:2em" class="grey-text text-darken-4">Texto</label>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto"></textarea>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Imagen</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                                <span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado 1400x720</span>
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <label>Orden</label>
                            <input type="text" id="frm_orden" name="frm_orden" />
                        </div>
                        <div class="col s12" style="padding-bottom: 0;">
                            <button class="waves-effect waves-light btn">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('frm_texto');
	CKEDITOR.config.width = '100%';
</script>
@endsection