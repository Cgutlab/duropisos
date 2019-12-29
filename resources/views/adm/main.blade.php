<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('headTitle', 'DuroPisos :: Administración')</title>
        <!-- <Fonts> -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,800,900" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

        <!-- </Fonts> -->
        <!-- <Styles> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/messagebox.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/lobibox.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/materialize-select2.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <!-- </Styles> -->
    </head>
    <body>
        <ul id="nav-mobile" class="sidenav s12 m3 xl3 sidenav-fixed" style="padding: 0; height: 100%; overflow-y: hidden; background-color:#ededed;" role="navigation">
            <li><img class="sidenav-img" src="{{ asset('img/logo/logotipo.png') }}"></li>
            <li class="no-padding scroll" style="height: calc(100% - 140.78px); overflow-x: auto">
                <ul class="collapsible z-depth-0 no-margin">
                    <li class="active">
                        <div class="collapsible-header"><i class="material-icons">home</i>Home</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('slider.edit', ['seccion' => 'home']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'home']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">view_day</i>Empresa</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('slider.edit', ['seccion' => 'empresa']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'empresa']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">storage</i>Productos</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('producto', ['tipo' => 'familia']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar familias</a></li>
                                <li><a href="{{ route('producto', ['tipo' => 'uno']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todos los productos</a></li>
                                <!-- <li><a href="{{ route('page', ['seccion' => 'producto']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">style</i>Aplicación</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'aplicacion']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todas las aplicaciones</a></li>
                                <!-- <li><a href="{{ route('page', ['seccion' => 'aplicacion']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">grid_on</i>Trabajos realizados</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'trabajo']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todos los trabajos</a></li>
                                <!-- <li><a href="{{ route('page', ['seccion' => 'trabajo']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help</i>Preguntas frecuentes</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'pregunta']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todas las preguntas</a></li>
                                <!-- <li><a href="{{ route('page', ['seccion' => 'pregunta']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <!--<li>-->
                    <!--    <div class="collapsible-header"><i class="material-icons">local_library</i>Distribuidores</div>-->
                    <!--    <div class="collapsible-body">-->
                    <!--        <ul>-->
                    <!--            <li><a href="{{ route('page', ['seccion' => 'distribuidor']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todos los distribuidores</a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <li>
                        <div class="collapsible-header"><i class="material-icons">insert_emoticon</i>Ventajas</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'ventaja']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todas las ventajas</a></li>
                                <!-- <li><a href="{{ route('page', ['seccion' => 'ventaja']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="dato">
                        <div class="collapsible-header"><i class="material-icons">work</i>Datos de la empresa</div>
                        <div class="collapsible-body">
                            <ul>{{-- --}}
                                <li><a href="{{ route('admempresa') }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar datos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dato">
                        <div class="collapsible-header"><i class="material-icons">description</i>Metadatos</div>
                        <div class="collapsible-body">
                            <ul>{{-- --}}
                                <li><a href="{{ route('metadatos') }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar metadatos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dato">
                        <div class="collapsible-header"><i class="material-icons">perm_contact_calendar</i>Usuarios</div>
                        <div class="collapsible-body">
                            <ul>
                                @if(Auth::user()["is_admin"])
                                    <li><a href="{{ route('usuario', ['seccion' => 'todos']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Todos los usuarios</a></li>
                                @endif
                                <li><a href="{{ route('usuario', ['seccion' => 'datos']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Datos de usuario</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
            </li>
            {{-- href="" --}}
            <a href="{{route('adm.logout')}}">
                Cerrar Sesión
            </a>
        </ul>
        <div class="row position-absolute w-100">
            <div class="col s12 m12 l9 xl9 offset-l3 offset-xl3">
                <div style="padding: 1em 0;" class="d-flex align-items-center">
                    <a href="#" data-target="nav-mobile" class="menu ocultar-menu no-margin sidenav-trigger text_principal_444444 bg-F9F9F9"><i class="material-icons">menu</i></a>
                    <span class="text-truncate">{{ $title }}</span>
                </div>
            </div>
        </div>
        <div id="page-wrapper" class="row no-margin">
            
            <div class="col s12 m12 l9 xl9 offset-l3 offset-xl3">
                <div class="container">
                </div>
                @yield('body')
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <form id="formModal" onsubmit="event.preventDefault(); submitEdit(this);" method="post" action="" novalidate  enctype="multipart/form-data">
                <div class="modal-content">
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
        <!-- <Script> -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="{{ asset('js/materialize.js') }}"></script>
        <script src="{{ asset('js/messagebox.js') }}"></script>
        <script src="{{ asset('js/lobibox.js') }}"></script>
        <script src="{{ asset('js/var.js') }}"></script>
        <!-- </Script> -->
        <script>
            url = '{{url()->current()}}';
            $(".active").removeClass("active");
            $(`a[href="${url}"]`).closest("ul").closest("li").addClass("active");
            $(`a[href="${url}"]`).closest("li").addClass("active");
            $(document).on("ready", function() {
                if($("#distribuidor").length) {
                    let column = [];
                    let columnDefs = [];
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
                    window["distribuidor"] = $("#distribuidor").DataTable({
                        "processing": true,
                        "pageLength": 10,
                        "serverSide": true,
                        "paging": true,
                        "lengthChange": true,
                        "responsive": true,
                        "ajax": "{{ route('datatable') }}",
                        "columns": column,
                        "columnDefs": columnDefs,
                        "fixedHeader": {
                            header: false,
                        },
                        "select": 'single',
                        "destroy": true,
                        "order": [[ 0, "desc" ]],
                        "searching": false,
                        "dom": 'lBfrtip',
                        "scrollX":true,
                        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
                        "buttons": [],
                        "language": translate_spanish
                    });
                }
            });
            M.AutoInit();
            
            $("#modal1").modal({
                onCloseEnd: function(modal, trigger) {
                    if(window.cantidadColor !== undefined)
                        delete window.cantidadColor;
                    if(window.cantidadTextura !== undefined)
                        delete window.cantidadTextura;
                },
                onOpenEnd: function(modal, trigger) {
                    $("#modal1").removeAttr("tabindex");
                    if($("#modal1").find("#texto").length) {
                        CKEDITOR.replace('texto');
	                    CKEDITOR.config.width = '100%';
                    }
                    if($("#modal1").find("#descripcion").length) {
                        CKEDITOR.replace('descripcion');
	                    CKEDITOR.config.width = '100%';
                    }
                    if($("#modal1").find("#ventaja").length) {
                        CKEDITOR.replace('ventaja');
	                    CKEDITOR.config.width = '100%';
                    }
                    if($("#modal1").find("#color").length) {
                        CKEDITOR.replace('color');
	                    CKEDITOR.config.width = '100%';
                    }
                    if($("#modal1").find("#presentacion").length) {
                        CKEDITOR.replace('presentacion');
	                    CKEDITOR.config.width = '100%';
                    }
                    if($("#modal1").find("#textura").length) {
                        CKEDITOR.replace('textura');
	                    CKEDITOR.config.width = '100%';
                    }

                    if(window.provincias !== undefined) {
                        promise = new Promise(function (resolve, reject) {
                            $("#provincia_id").select2({
                                data: window.provincias,
                                width: 'resolve',
                                placeholder: 'Seleccione Provincia',
                                allowClear: true
                            });
                            $("#localidad_id").select2({
                                width: 'resolve',
                                placeholder: 'Seleccione Provincia',
                            });
                            resolve();
                        });

                        promiseFunction = () => {
                            promise
                            .then(function() {
                                if(window.ubicacion_select !== undefined)
                                    $("#provincia_id").val(window.ubicacion_select.provincia_id).trigger("change");
                            })
                        }
                        promiseFunction();
                    } else {
                        if($(".modal select").length) 
                            $(".modal select").formSelect();
                    }
                    if(window.ARR_colores !== undefined) {
                        if(window.ARR_colores.length > 0) {
                            let t = $("#colores");
                            for(var x in window.ARR_colores) {
                                addColor(true);
                                t.find("> .row:last-child()").find(`[name="id_${parseInt(x) + 1}"]`).val(window.ARR_colores[x]["id"]);
                                t.find("> .row:last-child()").find(`[name="title_${parseInt(x) + 1}"]`).val((window.ARR_colores[x]["name"] === null ? "" : window.ARR_colores[x]["name"]));
                                t.find("> .row:last-child()").find(`[name="codigo_${parseInt(x) + 1}"]`).val((window.ARR_colores[x]["code"] === null ? "" : window.ARR_colores[x]["code"]));
                                t.find("> .row:last-child()").find(`[name="order_${parseInt(x) + 1}"]`).val((window.ARR_colores[x]["order"] === null ? "" : window.ARR_colores[x]["order"]));
                                t.find("> .row:last-child()").find(`[name="image_text_${parseInt(x) + 1}"]`).val(window.ARR_colores[x]["image"]);
                                t.find("> .row:last-child()").find(`[name="descripcion_${parseInt(x) + 1}"]`).val((window.ARR_colores[x]["descripcion"] === null ? "" : window.ARR_colores[x]["descripcion"]));
                            }
                            t = $("#texturas");
                            for(var x in window.ARR_texturas) {
                                addTextura(true);
                                t.find("> .row:last-child()").find(`[name="id_t_${parseInt(x) + 1}"]`).val(window.ARR_texturas[x]["id"]);
                                t.find("> .row:last-child()").find(`[name="title_t_${parseInt(x) + 1}"]`).val((window.ARR_texturas[x]["name"] === null ? "" : window.ARR_texturas[x]["name"]));
                                t.find("> .row:last-child()").find(`[name="codigo_t_${parseInt(x) + 1}"]`).val((window.ARR_texturas[x]["code"] === null ? "" : window.ARR_texturas[x]["code"]));
                                t.find("> .row:last-child()").find(`[name="order_t_${parseInt(x) + 1}"]`).val((window.ARR_texturas[x]["order"] === null ? "" : window.ARR_texturas[x]["order"]));
                                t.find("> .row:last-child()").find(`[name="image_t_text_${parseInt(x) + 1}"]`).val(window.ARR_texturas[x]["image"]);
                                t.find("> .row:last-child()").find(`[name="descripcion_t_${parseInt(x) + 1}"]`).val((window.ARR_texturas[x]["descripcion"] === null ? "" : window.ARR_texturas[x]["descripcion"]));
                            }
                            delete window.ARR_texturas;
                            delete window.ARR_colores;
                        }
                    }
                }
            });
            metadato = function() {
                let modal = $("#modal1");
                let html = footer = "";
                let url = "{{ url('/adm/data/') }}";
                let url_add = "{{ url('/adm/metadatos') }}";
                url += `/metadato/nada`;
                modal.find("form").attr("action",url_add);
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: 'json',
                    asy: false,
                    success: function(result) {
                        
                        html += '<h4>Editar metadatos</h4>';
                        html += '<div class="">';
                            html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                            html += `<input name="tipo" type="hidden" value="metadato">`;
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="description">Descripción</label>';
                                    html += `<textarea placeholder="Descripción" id="description" name="description" class="validate materialize-textarea" required="true">${result.description}</textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="metadato">Metadatos</label>';
                                    html += `<textarea placeholder="Metadatos" id="metadato" name="metadato" class="validate materialize-textarea" required="true">${result.description}</textarea>`;
                                    html += '<span class="helper-text">Palabras separadas por una coma (,)</span>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Editar</button>';
                        modal.find(".modal-content").html(html);
                        modal.find(".modal-footer").html(footer);
                        modal.modal("open");
                    }
                });
            }
            //
            editEmpresa = function(t) {
                let modal = $("#modal1");
                let html = footer = "";
                let url = "{{ url('/adm/data/') }}";
                let url_add = "{{ url('/adm/adddataempresa/') }}";
                url += `/${t}/nada`;
                modal.find("form").attr("action",url_add);
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: 'json',
                    asy: false,
                    success: function(result){
                        switch(t) {
                            case 'data':
                                window.ubicacion_select = {"provincia_id":result.provincia_id,"localidad_id":result.localidad_id};
                                html += `<input name="tipo" type="hidden" value="${t}">`;
                                html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                html += '<div class="container add">';
                                    html += '<div class="row">';
                                        html += '<div class=" col s12">';
                                            html += '<label for="direccion">Domicilio</label>';
                                            html += `<input value="${result.direccion}" placeholder="Domicilio" id="direccion" name="direccion" type="text" required="true" class="validate">`;
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row">';
                                        html += '<div class=" col s6">';
                                            html += '<label for="provincia_id">Provincia</label>';
                                            html += `<select onchange="buscarLocalidad(this)" id="provincia_id" name="provincia_id"></select>`;
                                        html += '</div>';
                                        html += '<div class=" col s6">';
                                            html += '<label for="localidad_id">Provincia</label>';
                                            html += `<select id="localidad_id" name="localidad_id"></select>`;
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row">';
                                        html += '<div class="file-field input-field col s12">';
                                            html += '<div class="btn">';
                                                html += '<span>Logotipo</span>';
                                                html += '<input type="file" id="logotipo" name="logotipo">';
                                            html += '</div>';
                                            html += '<div class="file-path-wrapper">';
                                                html += `<input value="${result.logo_principal}" class="file-path" id="logotipo_text" name="logotipo_text" type="text">`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row">';
                                        html += '<div class="file-field input-field col s12">';
                                            html += '<div class="btn">';
                                                html += '<span>Logotipo footer</span>';
                                                html += '<input type="file" id="logotipoFooter" name="logotipoFooter">';
                                            html += '</div>';
                                            html += '<div class="file-path-wrapper">';
                                                html += `<input value="${(result.logo_footer === null ? "" : result.logo_footer)}" class="file-path" id="logotipoFooter_text" name="logotipoFooter_text" type="text">`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row">';
                                        html += '<div class="file-field input-field col s12">';
                                            html += '<div class="btn">';
                                                html += '<span>Favicon</span>';
                                                html += '<input type="file" id="favicon" name="favicon">';
                                            html += '</div>';
                                            html += '<div class="file-path-wrapper">';
                                                html += `<input value="${(result.favicon === null ? "" : result.favicon)}" class="file-path" id="favicon_text" name="favicon_text" type="text">`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                html += '</div>';
                                footer += '<button type="submit" class="btn btn-success">Cambiar</button>';
                            break;
                            case "contacto":
                                html += `<input name="tipo" type="hidden" value="${t}">`;
                                html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                html += '<div class="container add">';
                                    html += '<div class="row">';
                                        html += '<div class=" col s12">';
                                            html += '<label for="email_1">Email 1</label>';
                                            html += `<input value="${result.email_1}" placeholder="Email 1" id="email_1" name="email_1" type="email" required="true" class="validate">`;
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row">';
                                        html += '<div class=" col s12">';
                                            html += '<label for="email_2">Email 2</label>';
                                            html += `<input value="${result.email_2}" placeholder="Email 2" id="email_2" name="email_2" type="email" class="validate">`;
                                        html += '</div>';
                                    html += '</div>';
                                    html += '<div class="row">';
                                        html += '<div class=" col s6">';
                                            html += '<label for="telefono_1">Teléfono</label>';
                                            html += `<input value="${result.telefono_1}" placeholder="Teléfono" id="telefono_1" name="telefono_1" type="text" required="true" class="validate">`;
                                        html += '</div>';
                                        html += '<div class=" col s6">';
                                            html += '<label for="whatsapp">WhatsApp</label>';
                                            html += `<input value="${result.whatsapp}" placeholder="WhatsApp" id="whatsapp" name="whatsapp" type="text" class="validate">`;
                                        html += '</div>';
                                    html += '</div>';

                                    html += '<div class="row">';
                                        html += '<div class=" col s6">';
                                            html += '<label for="facebook">Facebook</label>';
                                            html += `<input value="${(result.facebook === null ? "" : result.facebook)}" placeholder="Facebook" id="facebook" name="facebook" type="text" class="validate">`;
                                            html += '<span class="helper-text">Enlace completo</span>';
                                        html += '</div>';
                                        html += '<div class=" col s6">';
                                            html += '<label for="instagram">Instagram</label>';
                                            html += `<input value="${(result.instagram === null ? "" : result.instagram)}" placeholder="Instagram" id="instagram" name="instagram" type="text" class="validate">`;
                                            html += '<span class="helper-text">Enlace completo</span>';
                                        html += '</div>';
                                    html += '</div>';
                                html += '</div>';

                                footer += '<button type="submit" class="btn btn-success">Cambiar</button>';
                            break;
                        }

                        modal.find(".modal-content").html(html);
                        modal.find(".modal-footer").html(footer);
                        modal.modal("open");
                    }
                });
            }
            removeColor = function(t) {
                $(t).closest(".row").remove();
            }
            addColor = function(conID = false) {
                if(window.cantidadColor === undefined) window.cantidadColor = 0;
                window.cantidadColor ++;
                let t = $("#colores");
                let html = "";

                html += '<div class="row">';
                    if(conID)
                        html += `<input name="id_${window.cantidadColor}" type="hidden">`;
                    html += '<div class="col s6">';
                        html += '<div class="row m-0">';
                            html += '<div class="col s12">';
                                html += `<label for="title_${window.cantidadColor}">Título</label>`;
                                html += `<input placeholder="Título" id="title_${window.cantidadColor}" name="title_${window.cantidadColor}" type="text" required="true" class="validate">`;
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0">';
                            html += '<div class="col s6">';
                                html += `<label for="codigo_${window.cantidadColor}">Código</label>`;
                                html += `<input placeholder="Código" id="codigo_${window.cantidadColor}" name="codigo_${window.cantidadColor}" type="text" class="validate">`;
                            html += '</div>';
                            html += '<div class="col s6">';
                                html += `<label for="order_${window.cantidadColor}">Orden</label>`;
                                html += `<input maxlength="3" placeholder="Orden" id="order_${window.cantidadColor}" name="order_${window.cantidadColor}" type="text" class="validate">`;
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    
                    html += '<div class="col s6 position-relative" style="position:relative">';
                        html += '<div class="row m-0">';
                            html += '<div class="file-field input-field col s12">';
                                html += '<div class="btn">';
                                    html += '<span>Imagen</span>';
                                    html += `<input type="file" id="image_${window.cantidadColor}" name="image_${window.cantidadColor}">`;
                                html += '</div>';
                                html += '<div class="file-path-wrapper">';
                                    html += `<input class="file-path" required="true" id="image_text_${window.cantidadColor}" name="image_text_${window.cantidadColor}" type="text">`;
                                    // html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0">';
                            html += '<div class="col s12">';
                                html += '<span>Descripción</span>';
                                html += `<textarea placeholder="Descripción" id="descripcion-${window.cantidadColor}" name="descripcion-${window.cantidadColor}" class="validate materialize-textarea"></textarea>`;
                            html += '</div>';
                        html += '</div>';
                        html += '<button style="top:0; right:0" onclick="removeColor(this)" class="btn btn-danger position-absolute"><i class="large material-icons">delete_sweep</i></button>';
                    html += '</div>';
                html += '</div>';
                
                $("[name='cantidad_color']").val(window.cantidadColor);

                t.append(html);
                
                objDiv = document.getElementById("colores");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            
            addTextura = function(conID = false) {
                if(window.cantidadTextura === undefined) window.cantidadTextura = 0;
                window.cantidadTextura ++;
                let t = $("#texturas");
                let html = "";

                html += '<div class="row">';
                    if(conID)
                        html += `<input name="id_t_${window.cantidadTextura}" type="hidden">`;
                    html += '<div class="col s6">';
                        html += '<div class="row m-0">';
                            html += '<div class="col s12">';
                                html += `<label for="title_t_${window.cantidadTextura}">Título</label>`;
                                html += `<input placeholder="Título" id="title_t_${window.cantidadTextura}" name="title_t_${window.cantidadTextura}" type="text" required="true" class="validate">`;
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0">';
                            html += '<div class="col s6">';
                                html += `<label for="codigo_t_${window.cantidadTextura}">Código</label>`;
                                html += `<input placeholder="Código" id="codigo_t_${window.cantidadTextura}" name="codigo_t_${window.cantidadTextura}" type="text" class="validate">`;
                            html += '</div>';
                            html += '<div class="col s6">';
                                html += `<label for="order_t_${window.cantidadTextura}">Orden</label>`;
                                html += `<input maxlength="3" placeholder="Orden" id="order_t_${window.cantidadTextura}" name="order_t_${window.cantidadTextura}" type="text" class="validate">`;
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    
                    html += '<div class="col s6 position-relative" style="position:relative">';
                        html += '<div class="row m-0">';
                            html += '<div class="file-field input-field col s12">';
                                html += '<div class="btn">';
                                    html += '<span>Imagen</span>';
                                    html += `<input type="file" id="image_t_${window.cantidadTextura}" name="image_t_${window.cantidadTextura}">`;
                                html += '</div>';
                                html += '<div class="file-path-wrapper">';
                                    html += `<input class="file-path" required="true" id="image_t_text_${window.cantidadTextura}" name="image_t_text_${window.cantidadTextura}" type="text">`;
                                    // html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        html += '<div class="row m-0">';
                            html += '<div class="col s12">';
                                html += '<span>Descripción</span>';
                                html += `<textarea placeholder="Descripción" id="descripcion_t-${window.cantidadTextura}" name="descripcion_t-${window.cantidadTextura}" class="validate materialize-textarea"></textarea>`;
                            html += '</div>';
                        html += '</div>';
                        html += '<button style="top:0; right:0" onclick="removeColor(this)" class="btn btn-danger position-absolute"><i class="large material-icons">delete_sweep</i></button>';
                    html += '</div>';
                html += '</div>';
                
                $("[name='cantidad_textura']").val(window.cantidadTextura);

                t.append(html);
                
                objDiv = document.getElementById("colores");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            
            editUser = function() {
                let modal = $("#modal1");
                let url = "{{ url('/adm/data/') }}";
                let url_edit = "{{ url('/adm/editdata/') }}";
                url += `/mis_datos/nada`;
                // url_edit += `/${t}/${id}`;

                modal.find("form").attr("action",url_edit);
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: 'json',
                    asy: false,
                    success: function(result) {
                        html = '<h4>Cambiar mis datos</h4>';
                        html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                        html += `<input type="hidden" value="${result.is_admin}" name="is_admin" />`;
                        html += `<input name="tipo" type="hidden" value="mis_datos">`;
                        html += '<div class="">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="name">Nombre</label>';
                                    html += `<input value="${result.name}" placeholder="Nombre" id="name" name="name" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="username">Usuario</label>';
                                    html += `<input value="${result.username}" placeholder="Usuario" id="username" name="username" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="password">Cambiar contraseña</label>';
                                    html += `<input placeholder="Cambiar contraseña" id="password" name="password" type="password" class="validate">`;
                                    html += '<small class="helper-text">Complete solo si desea cambiar la contraseña de acceso</small>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer = '<button type="submit" class="btn btn-success">Cambiar</button>';
                        modal.find(".modal-content").html(html);
                        modal.find(".modal-footer").html(footer);
                        modal.modal("open");
                    }
                });
            }
            addRegistro = function(t) {
                let modal = $("#modal1");
                let html = footer = "";
                let url_add = "{{ url('/adm/adddata/') }}";
                switch(t) {
                    case 'usuario':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar usuario</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="name">Nombre</label>';
                                    html += `<input placeholder="Nombre" id="name" name="name" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="username">Usuario</label>';
                                    html += `<input placeholder="Usuario" id="username" name="username" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="password">Contraseña</label>';
                                    html += `<input placeholder="Contraseña" id="password" name="password" type="password" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="nivel">Nivel</label>';
                                    html += `<select id="nivel" name="nivel" required="true" class="validate">`;
                                        html += '<option value="" disabled selected>Seleccione</option>';
                                        html += '<option value="1">Usuario</option>';
                                        html += '<option value="2">Administrador</option>';
                                    html += '</select>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                        break;
                    case 'sliderhome':
                    case 'sliderempresa':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar slider</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="texto">Texto</label>';
                                    html += `<textarea id="texto" name="texto"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="first_name">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="image" name="image">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" required="true" id="image_text" name="image_text" type="text">`;
                                        // html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                    case 'ventaja':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar ventaja</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="first_name">Título</label>';
                                    html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s6">';
                                    html += '<label for="first_name">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="icon" name="icon">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" required="true" id="icon_text" name="icon_text" type="text">`;
                                        html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                    case 'producto':
                        url_add = "{{ url('/adm/addproducto/') }}";
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar producto</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += `<input name="_token" type="hidden" value="{{ csrf_token() }}">`;
                        html += `<input name="cantidad_color" type="hidden" value="">`;
                        html += `<input name="cantidad_textura" type="hidden" value="">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="name">Nombre</label>';
                                    html += `<input placeholder="Nombre" id="name" name="name" type="text" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="codigo">Código</label>';
                                    html += `<input placeholder="Código" id="codigo" name="codigo" type="text" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="input-field col s12">';
                                    html += '<select name="pfamilia_id" required="true">';
                                        html += '<option value="" disabled selected>Seleccione</option>';
                                        for(var i in window.familias)
                                            html += `<option value="${i}">${window.familias[i]}</option>`;
                                    html += '</select>';
                                    html += '<label>Familia de producto</label>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="url_mercadolibre">Link MercadoLibre</label>';
                                    html += `<input placeholder="Link MercadoLibre" id="url_mercadolibre" name="url_mercadolibre" type="text" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="url_mercadopago">Link MercadoPago</label>';
                                    html += `<input placeholder="Link MercadoPago" id="url_mercadopago" name="url_mercadopago" type="text" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="image" name="image">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" required="true" id="image_text" name="image_text" type="text">`;
                                        html += '<span class="helper-text">Tamaño recomendado 1100x380</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="descripcion">Descripción</label>';
                                    html += `<textarea id="descripcion" name="descripcion"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="ventaja">Ventaja</label>';
                                    html += `<textarea id="ventaja" name="ventaja"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="presentacion">Presentación</label>';
                                    html += `<textarea id="presentacion" name="presentacion"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="textura">Textura</label>';
                                    html += `<textarea id="textura" name="textura"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<button type="button" class="btn" onclick="addTextura()">Agregar textura</button>';    
                                html += '</div>';
                            html += '</div>';
                            html += '<div id="texturas"></div>';
                            html += '<hr/>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="color">Color</label>';
                                    html += `<textarea id="color" name="color"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<button type="button" class="btn" onclick="addColor()">Agregar color</button>';    
                                html += '</div>';
                            html += '</div>';
                            html += '<div id="colores"></div>';
                            html += '<hr/>';
                                        
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<p class="m-0">';
                                        html += '<label>';
                                            html += '<input type="checkbox" name="is_profesional" />';
                                            html += '<span>Profesional</span>';
                                        html += '</label>';
                                    html += '</p>';
                                    html += '<p class="m-0">';
                                        html += '<label>';
                                            html += '<input type="checkbox" name="is_particular" />';
                                            html += '<span>Particular</span>';
                                        html += '</label>';
                                    html += '</p>';
                                html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                    case 'pregunta':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar pregunta</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="pregunta">Pregunta</label>';
                                    html += `<input maxlength="191" placeholder="Pregunta" id="pregunta" name="pregunta" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="respuesta">Respuesta</label>';
                                    html += `<textarea placeholder="Respuesta" id="respuesta" name="respuesta" required="true" class="validate materialize-textarea"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                        break;
                    case 'aplicacion':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar aplicación</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="title">Título</label>';
                                    html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="video">Link de youtube</label>';
                                    html += `<input maxlength="20" placeholder="Youtube" id="video" name="video" type="text" required="true" class="validate"/>`;
                                    html += '<span class="helper-text">www.youtube.com/watch?v=<strong>XXXXXXXXXXX</strong></span>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                        break;
                    case "pfamilia":
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar familia de productos</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += '<div class="container add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="first_name">Título</label>';
                                    html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s6">';
                                    html += '<label for="first_name">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="image" name="image">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" required="true" id="image_text" name="image_text" type="text">`;
                                        html += '<span class="helper-text">Tamaño recomendado 400x400</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                        break;
                    case 'trabajo':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar trabajo</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="title">Título</label>';
                                    html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="input-field col s12 l6">';
                                    html += '<select name="pfamilia_id" required="true">';
                                        html += '<option value="" disabled selected>Seleccione</option>';
                                        for(var i in window.familias)
                                            html += `<option value="${i}">${window.familias[i]}</option>`;
                                    html += '</select>';
                                    html += '<label>Familia de producto</label>';
                                html += '</div>';
                                html += '<div class="input-field col s12 l6">';
                                    html += '<p style="margin-top:0;">';
                                        html += '<label>';
                                            html += '<input type="checkbox" class="filled-in" name="is_profesional_input" />';
                                            html += '<span>Profesional</span>';
                                        html += '</label>';
                                    html += '</p>';
                                    html += '<p style="margin-bottom:0;">';
                                        html += '<label>';
                                            html += '<input type="checkbox" class="filled-in" name="is_particular_input" />';
                                            html += '<span>Particular</span>';
                                        html += '</label>';
                                    html += '</p>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="image" name="image">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" required="true" id="image_text" name="image_text" type="text">`;
                                        html += '<span class="helper-text">Tamaño recomendado 360x210</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                    case 'servicio':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar servicio integral</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="title">Nombre</label>';
                                    html += `<input placeholder="Nombre" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="icon" name="icon">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" required="true" id="icon_text" name="icon_text" type="text">`;
                                        html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                    case "distribuidor":
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar distribuidor</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += '<div class="add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="local">Local</label>';
                                    html += `<input placeholder="Local" id="local" name="local" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="direccion">Dirección</label>';
                                    html += `<input placeholder="Dirección" id="direccion" name="direccion" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="latitud">Latitud</label>';
                                    html += `<input placeholder="Latitud" id="latitud" name="latitud" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="longitud">Longitud</label>';
                                    html += `<input placeholder="Longitud" id="longitud" name="longitud" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="telefono">Teléfono</label>';
                                    html += `<input placeholder="Teléfono" id="telefono" name="telefono" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="provincia_id">Provincia</label>';
                                    html += `<select onchange="buscarLocalidad(this)" id="provincia_id" name="provincia_id" required="true" style="width:100%"><select>`;
                                html += '</div>';
                                html += '<div class=" col s12 l6">';
                                    html += '<label for="localidad_id">Localidad</label>';
                                    html += `<select id="localidad_id" name="localidad_id" required="true" style="width:100%"><select>`;
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                }
                modal.find(".modal-content").html(html);
                modal.find(".modal-footer").html(footer);
                modal.modal("open");
            }
            edit = function(t,id) {
                let modal = $("#modal1");
                let url = "{{ url('/adm/data/') }}";
                let url_edit = "{{ url('/adm/editdata/') }}";
                url += `/${t}/${id}`;
                // url_edit += `/${t}/${id}`;

                modal.find("form").attr("action",url_edit);
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: 'json',
                    asy: false,
                    success: function(result){
                        if(result !== null) {
                            let html = footer = "";
                            switch(t) {
                                case 'usuario':
                                    html += '<h4>Editar usuario</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += '<div class="">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="name">Nombre</label>';
                                                html += `<input value="${result.name}" placeholder="Nombre" id="name" name="name" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="username">Usuario</label>';
                                                html += `<input value="${result.username}" placeholder="Usuario" id="username" name="username" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="password">Restaurar contraseña</label>';
                                                html += `<input placeholder="Restaurar contraseña" id="password" name="password" type="password" class="validate">`;
                                                html += '<small class="helper-text">Complete solo si desea cambiar la contraseña del usuario</small>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="nivel">Nivel</label>';
                                                html += `<select id="nivel" name="nivel" required="true" class="validate">`;
                                                    html += '<option value="" disabled selected>Seleccione</option>';
                                                    if(!parseInt(result.is_admin))
                                                        html += '<option selected value="1">Usuario</option>';
                                                    else
                                                        html += '<option value="1">Usuario</option>';
                                                    if(parseInt(result.is_admin))
                                                        html += '<option selected value="2">Administrador</option>';
                                                    else
                                                        html += '<option value="2">Administrador</option>';
                                                html += '</select>';
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                    break;
                                case 'pregunta':
                                    html += '<h4>Editar pregunta</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="pregunta">Pregunta</label>';
                                                html += `<input maxlength="191" placeholder="Pregunta" id="pregunta" name="pregunta" type="text" required="true" class="validate" value="${result.pregunta}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="respuesta">Respuesta</label>';
                                                html += `<textarea placeholder="Respuesta" id="respuesta" name="respuesta" required="true" class="validate materialize-textarea">${result.respuesta}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="order">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                    break;
                                case 'servicio':
                                    html += '<h4>Editar servicio</h4>';
                                    html += '<div class="">';
                                        html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                        html += `<input name="tipo" type="hidden" value="${t}">`;
                                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="first_name">Nombre</label>';
                                                html += `<input placeholder="Nombre" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += '<input type="file" id="icon" name="icon">';
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" required="true" value="${result.icon}" id="icon_text" name="icon_text" type="text">`;
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:96px; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.icon}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case "distribuidor":
                                    html = '<h4>Editar distribuidor</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="local">Local</label>';
                                                html += `<input placeholder="Local" id="local" value="${result.local}" name="local" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="direccion">Dirección</label>';
                                                html += `<input placeholder="Dirección" id="direccion" value="${result.direccion}" name="direccion" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="latitud">Latitud</label>';
                                                html += `<input placeholder="Latitud" value="${result.latitdu}" id="latitud" name="latitud" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="longitud">Longitud</label>';
                                                html += `<input placeholder="Longitud" value="${result.longitud}" id="longitud" name="longitud" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="telefono">Teléfono</label>';
                                                html += `<input placeholder="Teléfono" id="telefono" name="telefono" value="${(result.telefono === null ? "" : result.telefono)}" type="text" required="true" class="validate">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="provincia_id">Provincia</label>';
                                                html += `<select onchange="buscarLocalidad(this)" id="provincia_id" name="provincia_id" required="true" style="width:100%"><select>`;
                                            html += '</div>';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="localidad_id">Localidad</label>';
                                                html += `<select id="localidad_id" name="localidad_id" required="true" style="width:100%"><select>`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';

                                    window.ubicacion_select = {"provincia_id":result.provincia_id,"localidad_id":result.localidad_id};
                                break;
                                case 'slider':
                                    html += '<h4>Editar slider</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="texto">Texto</label>';
                                                html += `<textarea id="texto" name="texto" required="true">${(result.texto === null ? "" : result.texto)}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="order">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += `<input type="file" id="image" name="image">`;
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" value="${result.image}" required="true" type="text" id="image_text" name="image_text">`;
                                                    // html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:96px; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.image}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'producto':
                                    url_edit = "{{ url('/adm/editproducto/') }}";
                                    modal.find("form").attr("action",url_edit);
                                    window.ARR_colores = result.colores;
                                    window.ARR_texturas = result.texturas;
                                    html += '<h4>Editar producto</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                    html += `<input name="_token" type="hidden" value="{{ csrf_token() }}">`;
                                    html += `<input name="cantidad_color" type="hidden" value="${window.ARR_colores.length}">`;
                                    html += `<input name="cantidad_textura" type="hidden" value="${window.ARR_texturas.length}">`;
                                    html += '<div class="">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="name">Nombre</label>';
                                                html += `<input placeholder="Nombre" id="name" name="name" type="text" required="true" class="validate" value="${(result.name === null ? "" : result.name)}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="codigo">Código</label>';
                                                html += `<input placeholder="Código" id="codigo" name="codigo" type="text" class="validate" value="${(result.codigo === null ? "" : result.codigo)}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="order">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="input-field col s12">';
                                                html += '<select name="pfamilia_id" required="true">';
                                                    html += '<option value="" disabled selected>Seleccione</option>';
                                                    for(var i in window.familias) {
                                                        if(parseInt(result.pfamilia_id) == parseInt(i))
                                                            html += `<option value="${i}" selected>${window.familias[i]}</option>`;
                                                        else
                                                            html += `<option value="${i}">${window.familias[i]}</option>`;
                                                    }
                                                html += '</select>';
                                                html += '<label>Familia de producto</label>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="url_mercadolibre">Link MercadoLibre</label>';
                                                html += `<input placeholder="Link MercadoLibre" id="url_mercadolibre" name="url_mercadolibre" type="text" class="validate" value="${(result.url_mercadolibre === null ? "" : result.url_mercadolibre)}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="url_mercadopago">Link MercadoPago</label>';
                                                html += `<input placeholder="Link MercadoPago" id="url_mercadopago" name="url_mercadopago" type="text" class="validate" value="${(result.url_mercadopago === null ? "" : result.url_mercadopago)}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += '<input type="file" id="image" name="image">';
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path" required="true" id="image_text" name="image_text" type="text" value="${result.image}">`;
                                                    html += '<span class="helper-text">Tamaño recomendado 1100x380</span>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:100%; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.image}" alt="Imagen ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';

                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="descripcion">Descripción</label>';
                                                html += `<textarea id="descripcion" name="descripcion">${(result.descripcion === null ? "" : result.descripcion)}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="ventaja">Ventaja</label>';
                                                html += `<textarea id="ventaja" name="ventaja">${(result.ventaja === null ? "" : result.ventaja)}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="presentacion">Presentación</label>';
                                                html += `<textarea id="presentacion" name="presentacion">${(result.presentacion === null ? "" : result.presentacion)}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="textura">Textura</label>';
                                                html += `<textarea id="textura" name="textura">${(result.textura === null ? "" : result.textura)}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<button type="button" class="btn" onclick="addTextura()">Agregar textura</button>';    
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div id="texturas"></div>';
                                        html += '<hr/>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="color">Color</label>';
                                                html += `<textarea id="color" name="color">${(result.color === null ? "" : result.color)}</textarea>`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<button type="button" class="btn" onclick="addColor()">Agregar color</button>';    
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div id="colores"></div>';
                                        html += '<hr/>';
                                        

                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<p class="m-0">';
                                                    html += '<label>';
                                                        if(parseInt(result.is_profesional))
                                                            html += '<input type="checkbox" name="is_profesional" checked />';
                                                        else
                                                            html += '<input type="checkbox" name="is_profesional" />';
                                                        html += '<span>Profesional</span>';
                                                    html += '</label>';
                                                html += '</p>';
                                                html += '<p class="m-0">';
                                                    html += '<label>';
                                                        if(parseInt(result.is_particular))
                                                            html += '<input type="checkbox" name="is_particular" checked />';
                                                        else
                                                            html += '<input type="checkbox" name="is_particular" />';
                                                        html += '<span>Particular</span>';
                                                    html += '</label>';
                                                html += '</p>';
                                            html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'ventaja':
                                    html += '<h4>Editar ventaja</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="first_name">Título</label>';
                                                html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += `<input type="file" id="icon" name="icon">`;
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" value="${result.icon}" required="true" type="text" id="icon_text" name="icon_text">`;
                                                    html += '<span class="helper-text">Tamaño recomendado 92x92</span>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:96px; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.icon}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'pfamilia':
                                    html += '<h4>Editar familia de productos</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="title">Título</label>';
                                                html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="order">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += `<input type="file" id="image" name="image">`;
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" value="${result.image}" required="true" type="text" id="image_text" name="image_text">`;
                                                    html += '<span class="helper-text">Tamaño recomendado 400x400</span>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:96px; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.image}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'aplicacion':
                                    html += '<h4>Editar aplicación</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += '<label for="title">Título</label>';
                                                html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="video">Link de youtube</label>';
                                                html += `<input maxlength="20" placeholder="Youtube" id="video" name="video" type="text" required="true" class="validate" value="${result.video}"/>`;
                                                html += '<span class="helper-text">www.youtube.com/watch?v=<strong>XXXXXXXXXXX</strong></span>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'trabajo':
                                    html += '<h4>Editar trabajo</h4>';
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12 l6">';
                                                html += '<label for="title">Título</label>';
                                                html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="order">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="input-field col s12 l6">';
                                                html += '<select name="pfamilia_id" required="true">';
                                                    html += '<option value="" disabled selected>Seleccione</option>';
                                                    for(var i in window.familias) {
                                                        if(result.pfamilia_id == i)
                                                            html += `<option selected value="${i}">${window.familias[i]}</option>`;
                                                        else
                                                            html += `<option value="${i}">${window.familias[i]}</option>`;
                                                    }
                                                html += '</select>';
                                                html += '<label>Familia de producto</label>';
                                            html += '</div>';
                                            html += '<div class="input-field col s12 l6">';
                                                html += '<p style="margin-top:0;">';
                                                    html += '<label>';
                                                        if(parseInt(result.is_profesional))
                                                            html += '<input type="checkbox" class="filled-in" name="is_profesional_input" checked/>';
                                                        else
                                                            html += '<input type="checkbox" class="filled-in" name="is_profesional_input" />';
                                                        html += '<span>Profesional</span>';
                                                    html += '</label>';
                                                html += '</p>';
                                                html += '<p style="margin-bottom:0;">';
                                                    html += '<label>';
                                                        if(parseInt(result.is_particular))
                                                            html += '<input type="checkbox" class="filled-in" name="is_particular_input" checked/>';
                                                        else
                                                            html += '<input type="checkbox" class="filled-in" name="is_particular_input" />';
                                                        html += '<span>Particular</span>';
                                                    html += '</label>';
                                                html += '</p>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += '<input type="file" id="image" name="image">';
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path" required="true" value="${result.image}" id="image_text" name="image_text" type="text">`;
                                                    html += '<span class="helper-text">Tamaño recomendado 360x210</span>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:96px; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.image}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                            }
                            
                            modal.find(".modal-content").html(html);
                            modal.find(".modal-footer").html(footer);
                            modal.modal("open");
                        }
                    }
                });
                
            }
            submitEdit = function(t) {
                let url = t.action;
                let token = '{{ csrf_token() }}';
                let myForm = document.getElementById(t.id);
                let formData = new FormData(myForm);
                
                if(myForm.frm_id !== undefined)
                    formData.append("id", myForm.frm_id.value);

                formData.append("_token", token);
                
                if(validar(t)) {
                    let tipo = $("[name='tipo']").val();
                    if(tipo == "trabajo") {
                        if(!$("[name='is_particular_input']").is(":checked") && !$("[name='is_profesional_input']").is(":checked")) {
                            notificacion("Debe seleccionar un tipo de trabajo","error");
                            return false;
                        }
                        formData.append("is_particular", ($("[name='is_particular_input']").is(":checked") ? 1 : 0));
                        formData.append("is_profesional", ($("[name='is_profesional_input']").is(":checked") ? 1 : 0));
                    }
                    if(tipo == "sliderhome" || tipo == "sliderempresa" || tipo == "slider") {
                        let value = CKEDITOR.instances['texto'].getData();
                        formData.set("texto",value);
                    }
                    if(tipo == "producto") {
                        
                        
                        document.getElementById(t.id).submit();
                        
                        
                        // formData.set("is_particular", ($("[name='is_particular']").is(":checked") ? 1 : 0));
                        // formData.set("is_profesional", ($("[name='is_profesional']").is(":checked") ? 1 : 0));

                        // descripcion = CKEDITOR.instances['descripcion'].getData();
                        // ventaja = CKEDITOR.instances['ventaja'].getData();
                        // color = CKEDITOR.instances['color'].getData();

                        // formData.set("descripcion",descripcion);
                        // formData.set("ventaja",ventaja);
                        // formData.set("color",color);

                        // formData.append("cantidadColor",window.cantidadColor);
                    } else {
                        if($(t).find(".add").length) {
                            if(tipo == "data" || tipo == "contacto") {
                                $.ajax({
                                    url: t.action,
                                    method: 'POST',
                                    data:  formData,
                                    contentType: false,
                                    // cache: false,
                                    processData: false,
                                    beforeSend : function() {
                                        notificacion("Espere. Al finalizar se recargará la vista");
                                    },
                                    success: function() {
                                        location.reload()
                                    }
                                });
                            } else {
                                $.ajax({
                                    url: t.action,
                                    method: 'POST',
                                    data:  formData,
                                    contentType: false,
                                    // cache: false,
                                    processData: false,
                                    beforeSend : function() {
                                        notificacion("Espere. Al finalizar la tabla se actualizará");
                                    },
                                    success: function(data) {
                                        if(tipo != "distribuidor") {
                                            if($("table").find(".vacio").length)
                                                $("table").find(".vacio").remove();
                                            $("table").find("tbody").append(data);
                                        } else
                                            window.distribuidor.draw();
                                        $("#modal1").modal("close");
                                    }
                                });
                            }
                        } else {
                            $.ajax({
                                url: t.action,
                                method: 'POST',
                                data:  formData,
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend : function() {
                                    if(tipo == "metadato")
                                        notificacion("Espere. La página se recargará");
                                    else
                                        notificacion("Espere. Al finalizar la tabla se actualizará");
                                },
                                success: function(data){
                                    console.log(data)
                                    if(tipo == "metadato" || tipo == "mis_datos") {
                                        location.reload();
                                    } else {
                                        $("#modal1").modal("close");
                                        if(tipo != "distribuidor") {
                                            if(data.id !== undefined) {
                                                if($(`tr[data-id="${data.id}"]`).length)
                                                    $(`tr[data-id="${data.id}"]`).html(data.html)
                                            }
                                        } else
                                            window.distribuidor.draw();
                                    }
                                }
                            });
                        }
                    }
                } else
                    notificacion("Faltan datos necesarios","error");
            }
            erase = function(t,id) {
                name = t.toUpperCase();
                if(t == "pfamilia")
                    name = "FAMILIA DE PRODUCTOS"
                messagebox(`¿Está seguro de eliminar el registro de <strong>${name}</strong>?`,
                function() {
                    $(`tr[data-id="${id}"]`).remove();
                    let url = "{{ url('/adm/erase/') }}";
                    url += `/${t}/${id}`;
                    if($("table tbody").html().trim() == "") {
                        switch(t) {
                            case "pregunta":
                            case "ventaja":
                            case "aplicacion":
                            case "pfamilia":
                            case "servicio":
                            case "slider":
                                $("table tbody").html('<tr class="vacio"><td colspan="4">SIN DATOS</td></tr>');
                                break;
                            case "trabajo":
                            case "producto":
                                $("table tbody").html('<tr class="vacio"><td colspan="6">SIN DATOS</td></tr>');
                                break;
                        }
                    }
                    $.ajax({
                        url: url,
                        method: 'get',
                        success: function() {
                            if(t == "distribuidor")
                                window.distribuidor.draw();
                        }
                    });
                });
            }
            buscarLocalidad = function(t) {
                provincia = $(t).val();
                let promise = new Promise(function (resolve, reject) {
                    $.ajax({
                        url: `{{ url('/adm/buscar/localidad') }}/${provincia}`,
                        method: 'get',
                        dataType: 'json',
                        beforeSend: function() {
                            notificacion("Espere ...");
                        },
                        success: function(data) {
                            resolve(data);
                        }
                    });
                })
                promiseFunction = () => {
                    promise
                    .then(function(data) {
                        $("#localidad_id").select2({
                            data: data,
                            width: 'resolve',
                            placeholder: 'Seleccione Localidad',
                            allowClear: true
                        });
                        if(window.ubicacion_select !== undefined) {
                            $("#localidad_id").val(window.ubicacion_select.localidad_id).trigger("change");
                            delete window.ubicacion_select;
                        }
                    })
                }
                promiseFunction();
            }
        </script>
    </body>
</html>