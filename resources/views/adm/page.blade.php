@extends('adm.main')

@section('headTitle', 'Página | Duro pisos')
@section('bodyTitle', 'Página')

@section('body')
<main>
    @switch($seccion)
        @case('distribuidor')
        <div class="card">
            <div class="card-content">
                <span class="card-title">Distribuidores<button onclick="addRegistro('distribuidor')" class="btn right"><i class="fas fa-plus"></i></button></span>
                <table class="striped" id="distribuidor" style="width:100%"></table>
            </div>
        </div>
        <script>
            window.provincias = {!! json_encode($provincias) !!};
        </script>
        @break;
        @case('home')
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Empresa</span>
                    <form id="formEmpresa" action="{{ url('/adm/admempresa/') }}" method="POST" onsubmit="event.preventDefault(); empresa(this);" novalidate>
                        @csrf
                        @method('POST')
                        <input type="hidden" id="frm_tipo" name="frm_tipo" value="{{ $seccion }}"/>

                        @if(empty($empresa))
                            <h4>Título</h4>
                            <input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required></textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>

                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">send</i></button>
                        @else
                            <h4>Título</h4>
                            <input placeholder="Título" value="{{$empresa['title_resume']}}" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" value="{{$empresa['subtitle_resume']}}" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required>{{$empresa["text_resume"]}}</textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" value="{{$empresa['image_resume']}}" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="{{ asset('img') }}/{{$empresa['image_resume']}}?t=<?php echo time(); ?>" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>
                            @if(empty($empresa["title"]))
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">create</i></button>
                            @else
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Cambiar <i class="material-icons right">create</i></button>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
            <hr/>
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Servicio integral<button onclick="addRegistro('servicio')" class="btn right"><i class="fas fa-plus"></i></button></span>
                </div>
                <div class="card-content table">
                    <table class="striped">
                        <thead>
                            <th>Ícono</th>
                            <th>Nombre</th>
                            <th class="text-center">Orden</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @if(count($servicios) != 0)
                                @foreach($servicios as $servicio)
                                    <tr data-id="{{$servicio['id']}}">
                                        <td><img src="{{ asset('img/').'/'.$servicio['icon'] }}" style="height:50px;" /></td>
                                        <td>{{$servicio["title"]}}</td>
                                        <td class="text-center">{{$servicio["order"]}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="edit('servicio',{{$servicio['id']}})"><i class="material-icons">create</i></button>
                                            <button type="button" class="btn btn-danger" onclick="erase('servicio',{{$servicio['id']}})"><i class="material-icons">delete</i></button>
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
        @break
        @case('empresa')
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Empresa</span>

                    <form id="formEmpresa" action="{{ url('/adm/admempresa/') }}" method="POST" onsubmit="event.preventDefault(); empresa(this);" novalidate>
                        @csrf
                        @method('POST')
                        <input type="hidden" id="frm_tipo" name="frm_tipo" value="{{ $seccion }}"/>

                        @if(empty($empresa))
                            <h4>Título</h4>
                            <input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required></textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>

                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">send</i></button>
                        @else
                            <h4>Título</h4>
                            <input placeholder="Título" value="{{$empresa['title']}}" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" value="{{$empresa['subtitle']}}" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required>{{$empresa["text"]}}</textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" value="{{$empresa['image']}}" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="{{ asset('img') }}/{{$empresa['image']}}?t=<?php echo time(); ?>" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>
                            @if(empty($empresa["title"]))
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">create</i></button>
                            @else
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Cambiar <i class="material-icons right">create</i></button>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @break;
        @case("producto")
        @case("aplicacion")
        @case("trabajo")
        @case("pregunta")
        @case("ventaja")
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Título</span>
                    <form id="formTitulo" action="{{ url('/adm/titulo/') }}" method="POST" onsubmit="event.preventDefault(); titulo(this);" novalidate>
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="frm_tipo" value="{{ $seccion }}"/>
                        @if(empty($data))
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required></textarea>
                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">send</i></button>
                        @else
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required>{{$data["title"]}}</textarea>
                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Cambiar <i class="material-icons right">create</i></button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @break;
    @endswitch
</main>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
<script>
    const translate_spanish = {
    buttons: {
        pageLength: {
            _: "%d filas",
            '-1': "Todo"
        }
    },
    "sLengthMenu": "_MENU_",
    "lengthMenu": "_MENU_",

    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "_START_ de _END_ - _TOTAL_ registros",
    "info": "_START_ de _END_ - _TOTAL_ registros",
    "sInfoEmpty": "Sin registros",
    "infoEmpty": "Sin registros disponibles", "infoFiltered": "(filtrado de _MAX_ registros)",
    "sInfoFiltered": "(total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscador: ",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "<<",
        "sLast": ">>",
        "sNext": ">",
        "sPrevious": "<"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },

    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "",
    "zeroRecords": "No se encontraron registros",
    "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "select": {
        //"rows": { _: "%d filas seleccionadas", 0: "", 1: "1 fila seleccionada" }
        "rows": { _: "%d filas seleccionadas", 0: "", 1: "" }
    },
};
    if($("#distribuidor").length) {
        let columns = [];
        let columnDefs = [];
        let ARR_btn = [];
        columnDefs.push({"targets": [0], "className": "text-left text-uppercase"});
        columnDefs.push({"targets": [1], "className": "text-left text-uppercase"});
        columnDefs.push({"targets": [2], "className": "text-left text-uppercase"});
        columnDefs.push({"targets": [3], "className": "text-left text-uppercase"});
        columnDefs.push({"targets": [4], "className": "text-left"});
        columns.push({data:"local",title:"LOCAL"});
        columns.push({data:"direccion", title:"DIRECCIÓN"});
        columns.push({data:"localidad", title:"LOCALIDAD"});
        columns.push({data:"provincia", title:"PROVINCIA"});
        columns.push({data:"telefono", title:"TELÉFONO"});

        ARR_btn.push({
            extend: 'selected',
            text: '<i class="fas fa-eye"></i>',
            className: 'btn-dark',
            action: function ( e, dt, node, config ) {
                let rows = dt.rows( { selected: true } ).data()[0];
                edit('distribuidor',rows.id);
            }
        });
	
		ARR_btn.push({
            extend: 'selected',
            text: '<i class="fas fa-trash-alt"></i>',
            className: 'btn-danger',
            action: function ( e, dt, node, config ) {
                let rows = dt.rows( { selected: true } ).data()[0];
                erase('distribuidor',rows.id);
            }
        });
        window["distribuidor"] = $("#distribuidor").DataTable({
            processing: true,
            pageLength: 10,
            serverSide: true,
            paging: true,
            lengthChange: true,
            responsive: true,
            ajax: {
                method: 'POST',
                url: '{{ route('datatable') }}',
                data: { _token: '{{ csrf_token() }}' }
            },
            columns: columns,
            columnDefs: columnDefs,
            fixedHeader: {
                header: false,
            },
            select: 'single',
            destroy: true,
            order: [[ 0, "desc" ]],
            searching: false,
            dom: 'lBfrtip',
            scrollX:true,
            lengthMenu: [[10, 25, 50], [10, 25, 50]],
            buttons: ARR_btn,
            language: translate_spanish
        });
    }
    
    CKEDITOR.replace('frm_texto');

    CKEDITOR.config.width = '100%';
    empresa = function(t) {
        if(validar(t)) {
            let value = CKEDITOR.instances['frm_texto'].getData();
            let myForm = document.getElementById(t.id);
            let formData = new FormData(myForm);
            if(value == "") {
                notificacion("Faltan datos","error");
                return false;
            }
            formData.set("frm_texto",value);
            $.ajax({
                url: t.action,
                method: 'POST',
                data:  formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    notificacion("Espere ...");
                },
                success: function(result){
                    notificacion("La vista se recargara.")
                    location.reload();
                    // if(!result.estado) {
                    //     $("#formTitulo").find("button").html('Cambiar <i class="material-icons right">create</i>');
                    // }
                    // notificacion(result.txt,result.color);
                }
            });
        }
    }
    titulo = function(t) {
        if(validar(t)) {
            let value = CKEDITOR.instances['frm_texto'].getData();
            if(value == "") {
                notificacion("Faltan datos","error");
                return false;
            }

            value = value.trim();
            let tipo = $("#frm_tipo").val();
            let url = $("#formTitulo").attr("action");
            let token = '{{ csrf_token() }}';
            
            // url += `/${tipo}/${value}`;
            // t.submit();  
            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json',
                data: { page: tipo, title: value, _token:token},
                asy: false,
                success: function(result){
                    if(!result.estado) {
                        $("#formTitulo").find("button").html('Cambiar <i class="material-icons right">create</i>');
                    }
                    notificacion(result.txt,result.color);
                }
            });
        } else {
            
        }
    }
</script>
@endsection