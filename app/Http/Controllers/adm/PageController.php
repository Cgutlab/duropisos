<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Page;
use App\Servicio;
use App\Empresa;
use App\Titulo;
use App\Ventaja;
use App\Pregunta;
use App\Aplicacion;
use App\Pfamilia;
use App\Producto;
use App\Trabajo;
use App\Provincia;
use App\Localidad;
use App\Distribuidor;
use App\EmpresaDato;
use App\EmpresaContacto;
use App\Slider;
use App\Colorproducto;
use App\Metadato;
use App\User;
use Mockery\Undefined;

class PageController extends Controller
{
    public function search($tipo,$id) {

        $ARRlocalidades = Localidad::where('provincia_id', $id)->orderBy('nombre')->pluck('nombre', 'id');
        $localidades[] = ["id" => "","text" => ""];
        foreach($ARRlocalidades AS $k => $v) {
            $localidades[] = ["id" => $k,"text" => $v];
        }

        return $localidades;
    }
    public function edit($seccion)
    {
        $seccion = $seccion;
        $title = "Contenido: " . strtoupper($seccion);
        switch($seccion) {
            case "home":
                $empresa = Empresa::first();
                $servicios = Servicio::orderBy('order')->paginate(8);
                return view('adm.page', compact('seccion','title','servicios','empresa'));
                break;
            case "distribuidor":
                $provincias = [];
                $ARRprovincias = Provincia::orderBy('id')->pluck('nombre', 'id');
                $provincias[] = ["id" => "","text" => ""];
                foreach($ARRprovincias AS $k => $v) {
                    $provincias[] = ["id" => $k,"text" => $v];
                }
                return view('adm.page', compact('seccion','title','provincias'));
                break;
            case "empresa":
                $empresa = Empresa::first();
                // $empresa["title"] = isEmpty($empresa["title"]) ? "Sin título" : $empresa["title"];
                return view('adm.page', compact('seccion','title','empresa'));
                break;
            case "producto":
            case "aplicacion":
            case "trabajo":
            case "pregunta":
            case "ventaja":
                $data = Titulo::where('page', $seccion)->first();
                $data = ($data === null ? "" : $data);
                return view('adm.page', compact('seccion','title','data'));
                break;
        }
    }
    public function addproducto(Request $request) {
        $validated = $request->all();
        // dd($validated);
        $url = $validated["url"];
        $cantidad_color = $validated["cantidad_color"];
        $cantidad_color = $validated["cantidad_textura"];
        //$cantidad_color = 19;
        
        $producto = [];
        $producto['codigo'] = $validated["codigo"];
        if($request->hasFile('image')) {
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $fileName = strtoupper($validated['codigo']) . '-' . str_replace(" ", "_", $validated['name']) . '.' . $extension;
            
            $path = public_path('img/uploads/');
            $name = "{$url}/uploads/{$fileName}";
            $file->move($path, $fileName);
            
            $producto["image"] = "uploads/{$fileName}";
        } else
            $producto['image'] = $validated["image_text"];
        $producto['name'] = $validated["name"];
        $producto['order'] = $validated["order"];
        $producto['url'] = "";
        $producto['descripcion'] = $validated["descripcion"];
        $producto['presentacion'] = $validated["presentacion"];
        $producto['ventaja'] = $validated["ventaja"];
        $producto['color'] = $validated["color"];
        $producto['textura'] = $validated["textura"];
        $producto['url_mercadolibre'] = $validated["url_mercadolibre"];
        $producto['url_mercadopago'] = $validated["url_mercadopago"];
        
        $producto['is_particular'] = (isset($validated["is_particular"]) ? 1 : 0);
        $producto['is_profesional'] = (isset($validated["is_profesional"]) ? 1 : 0);
        $producto['pfamilia_id'] = $validated["pfamilia_id"];
        $obj = Producto::create($producto);
        for($i = 1; $i <= $cantidad_color; $i++) {
            $color = [];
            // if($request->hasFile("image_{$i}")) {
                $file = $request->file("image_" . $i);
                $extension = $file->getClientOriginalExtension();
                $fileName = strtoupper($validated["codigo_{$i}"]) . '-' . str_replace(" ", "_", $validated["title_{$i}"]) . '.' . $extension;
                
                $path = public_path('img/uploads/');
                $name = "{$url}/uploads/{$fileName}";
                $file->move($path, $fileName);
                
                $color["image"] = "uploads/{$fileName}";
            // } else
            //     $color['image'] = $validated["image_text-{$i}"];
            $color['name'] = $validated["title_{$i}"];
            $color['code'] = $validated["codigo_{$i}"];
            $color['order'] = $validated["order_{$i}"];
            $color['descripcion'] = $validated["descripcion-{$i}"];
            $color['producto_id'] = $obj["id"];
            
            Colorproducto::create($color);
        }
        
        for($i = 1; $i <= $cantidad_textura; $i++) {
            $textura = [];
            // if($request->hasFile("image_{$i}")) {
                $file = $request->file("image_" . $i);
                $extension = $file->getClientOriginalExtension();
                $fileName = strtoupper($validated["codigo_{$i}"]) . '-' . str_replace(" ", "_", $validated["title_{$i}"]) . '.' . $extension;
                
                $path = public_path('img/uploads/');
                $name = "{$url}/uploads/{$fileName}";
                $file->move($path, $fileName);
                
                $color["image"] = "uploads/{$fileName}";
            // } else
            //     $color['image'] = $validated["image_text-{$i}"];
            $textura['name'] = $validated["title_{$i}"];
            $textura['code'] = $validated["codigo_{$i}"];
            $textura['order'] = $validated["order_{$i}"];
            $textura['descripcion'] = $validated["descripcion-{$i}"];
            $textura['producto_id'] = $obj["id"];
            
            Texturaproducto::create($textura);
        }
        
        return back()->withInput(array('tipo' => "uno"));
    }
    public function editproducto(Request $request) {
        $validated = $request->all();
        $cantidad_color = $validated["cantidad_color"];
        $cantidad_textura = $validated["cantidad_textura"];
        $obj_producto = self::data("producto",$validated["frm_id"]);
        $obj_colores = $obj_producto["colores"];
        $obj_texturas = $obj_producto["texturas"];
        
        $AUX = [];
        
        foreach($obj_colores AS $k => $v)
            $AUX[$v["id"]] = "";
            
        unset($obj_producto["colores"]);//saco colores disponibles
        $url = $validated["url"];
        
        $producto = [];
        $producto['id'] = $validated["frm_id"];
        $producto['codigo'] = $validated["codigo"];
        if($request->hasFile('image')) {
            
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            
            $path = public_path('img/uploads/');
            $name = "{$url}/uploads/{$fileName}";
            $file->move($path, $fileName);
            
            $producto["image"] = "uploads/{$fileName}";
        } else
            $producto['image'] = $validated["image_text"];
        $producto['name'] = $validated["name"];
        $producto['order'] = $validated["order"];
        $producto['url'] = "";
        $producto['descripcion'] = $validated["descripcion"];
        $producto['presentacion'] = $validated["presentacion"];
        $producto['ventaja'] = $validated["ventaja"];
        $producto['color'] = $validated["color"];
        $producto['url_mercadolibre'] = $validated["url_mercadolibre"];
        $producto['url_mercadopago'] = $validated["url_mercadopago"];
        
        $producto['is_particular'] = (isset($validated["is_particular"]) ? 1 : 0);
        $producto['is_profesional'] = (isset($validated["is_profesional"]) ? 1 : 0);
        $producto['pfamilia_id'] = $validated["pfamilia_id"];
        
        $obj_producto->fill($producto);
        $obj_producto->save();
        
        for($i = 1; $i <= $cantidad_color; $i++) {
            $color = [];
            if(isset($validated["id_{$i}"])) {
                $obj_color = self::data("colorproducto",$validated["id_{$i}"]);
                if(isset($AUX[$validated["id_{$i}"]]))
                    unset($AUX[$validated["id_{$i}"]]);
                    
                
                $color['id'] = $validated["id_{$i}"];
                if($request->hasFile("image_{$i}")) {
                } else
                    $color['image'] = $validated["image_text_{$i}"];
                $color['name'] = $validated["title_{$i}"];
                $color['code'] = $validated["codigo_{$i}"];
                $color['order'] = $validated["order_{$i}"];
                $color['descripcion'] = $validated["descripcion-{$i}"];
                $color['producto_id'] = $validated["frm_id"];
                $obj_color->fill($color);
                $obj_color->save();
            } else {
                if(!isset($validated["title_{$i}"])) continue;
                if($request->hasFile("image_{$i}")) {
                    $file = $request->file("image_" . $i);
                    $extension = $file->getClientOriginalExtension();
                    $fileName = strtoupper($validated["codigo_{$i}"]) . '-' . str_replace(" ", "_", $validated["title_{$i}"]) . '.' . $extension;
                    
                    $path = public_path('img/uploads/');
                    $name = "{$url}/uploads/{$fileName}";
                    $file->move($path, $fileName);
                    
                    $color["image"] = "uploads/{$fileName}";
                } else
                    $color['image'] = $validated["image_text_{$i}"];
                $color['name'] = $validated["title_{$i}"];
                $color['code'] = $validated["codigo_{$i}"];
                $color['order'] = $validated["order_{$i}"];
                $color['descripcion'] = $validated["descripcion-{$i}"];
                $color['producto_id'] = $validated["frm_id"];
                
                Colorproducto::create($color);
                
                // dd($color);
            }
        }
        
        for($i = 1; $i <= $cantidad_textura; $i++) {
            $textura = [];
            if(isset($validated["id_{$i}"])) {
                $obj_textura = self::data("texturaproducto",$validated["id_{$i}"]);
                if(isset($AUX2[$validated["id_{$i}"]]))
                    unset($AUX2[$validated["id_{$i}"]]);
                    
                
                $textura['id'] = $validated["id_t_{$i}"];
                if($request->hasFile("image_t_{$i}")) {
                    
                } else
                    $textura['image'] = $validated["image_t_text_{$i}"];
                $textura['name'] = $validated["title_t_{$i}"];
                $textura['code'] = $validated["codigo_t_{$i}"];
                $textura['order'] = $validated["order_t_{$i}"];
                $textura['descripcion'] = $validated["descripcion_t-{$i}"];
                $textura['producto_id'] = $validated["frm_id"];
                $obj_textura->fill($textura);
                $obj_textura->save();
            } else {
                if(!isset($validated["title_t_{$i}"])) continue;
                if($request->hasFile("image_t_{$i}")) {
                    $file = $request->file("image_t_" . $i);
                    $extension = $file->getClientOriginalExtension();
                    $fileName = strtoupper($validated["codigo_t_{$i}"]) . '-' . str_replace(" ", "_", $validated["title_t_{$i}"]) . '.' . $extension;
                    
                    $path = public_path('img/uploads/');
                    $name = "{$url}/uploads/{$fileName}";
                    $file->move($path, $fileName);
                    
                    $textura["image"] = "uploads/{$fileName}";
                } else
                    $textura['image'] = $validated["image_t_text_{$i}"];
                $textura['name'] = $validated["title_t_{$i}"];
                $textura['code'] = $validated["codigo_t_{$i}"];
                $textura['order'] = $validated["order_t_{$i}"];
                $textura['descripcion'] = $validated["descripcion_t-{$i}"];
                $textura['producto_id'] = $validated["frm_id"];
                
                Texturaproducto::create($textura);
                
                // dd($color);
            }
        }
        
        foreach($AUX AS $k => $v) {
            self::erase("colorproducto",$k);
        }
        return back()->withInput(array('tipo' => "uno"));
    }
    
    /**
     * Función para la edición de titulo en la vista
     * En lo posible que sea solo una linea
     * (?) limitar caracteres
     */
    public function titulo(Request $request) {
        $validated = $request->all();
        $data = Titulo::where('page', $validated["page"])->first();
        $tipo = strtoupper($validated["page"]);
        if($data === null) {
            Titulo::create($validated);
            return ["estado" => 1,"txt" => "Título de {$tipo} agregado correctamente","color" => "success"];
        } else {
            $data->fill($validated);
            $data->save();
            return ["estado" => 0,"txt" => "Título de {$tipo} editado correctamente","color" => "info"];
        }
    }
    /**
     * Función para traer datos de la BASE
     */
    public function data($tipo,$id) {
        $data = null;
        switch($tipo) {
            case "mis_datos":
                $data = Auth::user();
                break;
            case "usuario":
                $data = User::find($id);
                break;
            case "contacto":
                $data = EmpresaContacto::first();
                break;
            case "data":
                $data = EmpresaDato::first();
                break;
            case "servicio":
                $data = Servicio::find($id);
                break;
            case "ventaja":
                $data = Ventaja::find($id);
                break;
            case "aplicacion":
                $data = Aplicacion::find($id);
                break;
            case "pfamilia":
                $data = Pfamilia::find($id);
                break;
            case "trabajo":
                $data = Trabajo::find($id);
                break;
            case "slider":
                $data = Slider::find($id);
                break;
            case "producto":
                $data = Producto::find($id);
                $data["colores"] = Producto::find($id)->colores;
                $data["texturas"] = Producto::find($id)->texturas;
                break;
            case "pregunta":
                $data = Pregunta::find($id);
                break;
            case "colorproducto":
                $data = Colorproducto::find($id);
                break;
            case "distribuidor":
                $data = Distribuidor::find($id);
                break;
            case "metadato":
                $data = Metadato::first();
                break;
        }
        return $data;
    }
    public function editdata(Request $request) {
        $datos = $request->all();
        // return $datos;die();
        $tipo = $datos["tipo"];
        $data = null;
        $icon_text = $image_text = $url = "";
        $id = $datos["id"];
        
        unset($datos["tipo"]);
        unset($datos["_token"]);

        if(isset($datos["frm_id"]))
            unset($datos["frm_id"]);//porque ya tengo id solo
        if(isset($datos["url"])) {
            $url = $datos["url"];
            unset($datos["url"]);
        }
        
        if(isset($datos["icon_text"])) {
            $icon_text = $datos["icon_text"];
            unset($datos["icon_text"]);
        }
        if(isset($datos["image_text"])) {
            $image_text = $datos["image_text"];
            unset($datos["image_text"]);
        }
        if(isset($datos["is_particular_input"]))
            unset($datos["is_particular_input"]);
        if(isset($datos["is_profesional_input"]))
            unset($datos["is_profesional_input"]);

        $data = self::data($tipo,$id);
        switch($tipo) {
            case "servicio":
            case "ventaja":
                $datos["icon"] = $data["icon"];
                break;
            case "pfamilia":
            case "trabajo":
            case "slider":
            case "producto":
                $datos["image"] = $data["image"];
                break;
        }
        if($tipo == "pfamilia") {
            $datos["url"] = self::limpiarCaracteresEspeciales($datos["title"]);
            $datos["url"] = str_replace(" ","_",$datos["url"]);
            $datos["url"] = strtolower($datos["url"]);
        }
        if($tipo == "producto")
            unset($data["colores"]);
        if(!empty($icon_text)) {
            if(isset($datos["icon"])) {
                $file = $request->file('icon');
                if(true) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    
                    $path = public_path('img/uploads/');
                    $name = "{$url}/uploads/{$fileName}";
                    $file->move($path, $fileName);
                    
                    $datos["icon"] = "uploads/{$fileName}";
                }
            }
        }
        if(!empty($image_text)) {
            if(isset($datos["image"])) {
                $file = $request->file('image');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    if(!empty($datos["image"])) {
                        list($p,$f) = explode("/",$datos["image"]);
                        $fileName = $f;
                    }
                    $path = public_path('img/uploads/');
                    $name = $path . $fileName;
                    $file->move($path, $fileName);
                    $datos["image"] = "uploads/{$fileName}";
                }
            }
        }
        if($tipo == "usuario") {
            $datos["is_admin"] = 0;
            $datos["password"] = $data["password"];
            if(!empty($datos["password"]))
                $datos["password"] = Hash::make($datos["password"]);
            
            $nivel = $datos["nivel"];
            unset($datos["nivel"]);
            if($nivel == 2)
                $datos["is_admin"] = 1;
        }
        if($tipo == "mis_datos") {
            if(!empty($datos["password"]))
                $datos["password"] = Hash::make($datos["password"]);
            else
                $datos["password"] = $data["password"];
        }
        
        $data->fill($datos);
        $data->save();
        switch($tipo) {
            case "usuario":
                $tipo = "Usuario";
                if($nivel == 2) $tipo = "Administrador";
                $html = "<td>{$datos["name"]}</td>";
                $html .= "<td>{$datos["username"]}</td>";
                $html .= "<td>{$tipo}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'usuario\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'usuario\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
            case "slider":
                $name = "{$url}/{$datos["image"]}?time=" . time();
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["texto"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'slider\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'slider\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "producto":
                $cantidad = $datos["cantidadColor"];
                $Arr_colores = [];
                unset($datos["cantidadColor"]);
                for($i = 1; $i <= $cantidad; $i++) {
                    if(!isset($datos["title-{$i}"]))
                        continue;
                    if(isset($datos["id-{$i}"])) {
                        $image = NULL;
                        if(!empty($datos["image-{$i}"])) {
                            $image = $request->file("image-{$i}");
                            //$image = $datos["image-{$i}"];
                            unset($datos["image-{$i}"]);
                        }
                        if(isset($Aaux[$datos["id-{$i}"]]))
                            unset($Aaux[$datos["id-{$i}"]]);
                        $arr = [];
                        $arr["id"] = $datos["id-{$i}"];
                        $arr["name"] = $datos["title-{$i}"];
                        $arr["code"] = $datos["codigo-{$i}"];
                        $arr["order"] = $datos["order-{$i}"];
                        $arr["descripcion"] = $datos["descripcion-{$i}"];
                        // try {
                            $arr["image"] = $image;
                        // } catch (\Throwable $th) {
                        //     $arr["image"] = NULL;
                        // }
                        $arr["image_text"] = $datos["image_text-{$i}"];
                        $Arr_colores[] = $arr;
                        unset($datos["id-{$i}"]);
                        unset($datos["title-{$i}"]);
                        unset($datos["codigo-{$i}"]);
                        unset($datos["descripcion-{$i}"]);
                        unset($datos["image_text-{$i}"]);
                        // print_r($Arr_colores);
                    } else {
                        $image = NULL;
                        if(isset($datos["image-{$i}"])) {
                            if(!empty($datos["image-{$i}"])) {
                                $image = $request->file("image-{$i}");
                                unset($datos["image-{$i}"]);
                            }
                        }
                        $arr = [];
                        $arr["name"] = $datos["title-{$i}"];
                        $arr["code"] = $datos["codigo-{$i}"];
                        $arr["order"] = $datos["order-{$i}"];
                        $arr["descripcion"] = $datos["descripcion-{$i}"];
                        
                        $arr["image"] = $image;
                        $arr["image_text"] = $datos["image_text-{$i}"];
                        $Arr_colores[] = $arr;
                        unset($datos["title-{$i}"]);
                        unset($datos["codigo-{$i}"]);
                        unset($datos["descripcion-{$i}"]);
                        unset($datos["image_text-{$i}"]);
                    }
                }
                for($i = 0; $i < count($Arr_colores); $i++) {
                    $file = $Arr_colores[$i]["image"];
                    if(isset($Arr_colores[$i]["id"])) {
                        $color = Colorproducto::find($Arr_colores[$i]["id"]);
                    
                        $Arr_colores[$i]["image"] = $color["image"];
                        dd($file);
                        if(!is_null($file)) {
                            $extension = $file->getClientOriginalExtension();
                            $fileName = strtoupper($Arr_colores[$i]["code"]) . '-' . str_replace(" ","_",$Arr_colores[$i]["name"]) . '.' . $extension;
                            $path = public_path('img/uploads/');
                            $name = "{$url}/uploads/{$fileName}";
                            $file->move($path, $fileName);
                            $Arr_colores[$i]["image"] = "uploads/{$fileName}";
                        }
                    
                        $color->fill($Arr_colores[$i]);
                        $color->save();
                    } else {
                        //$file = $Arr_colores[$i]["image"];
                        $fileName = "";
                        if(!is_null($file)) {
                            $extension = $file->getClientOriginalExtension();
                            $fileName = strtoupper($Arr_colores[$i]["code"]) . '-' . str_replace(" ","_",$Arr_colores[$i]["name"]) . '.' . $extension;
                            $path = public_path('img/uploads/');
                            $name = "{$url}/uploads/{$fileName}";
                            $file->move($path, $fileName);
                        }
                        $Arr_colores[$i]["image"] = "uploads/{$fileName}";
                        $Arr_colores[$i]["producto_id"] = $data["id"];
                        // print_r($Arr_colores[$i]);
                        Colorproducto::create($Arr_colores[$i]);
                    }
                }

                $name = "{$url}/{$datos["image"]}?time=" . time();
                $familia = Pfamilia::find($datos["pfamilia_id"])["title"];
                $html = "<td>{$datos["codigo"]}</td>";
                $html .= "<td><img style='height:50px;' src='{$name}' /></td>";
                $html .= "<td>{$datos["name"]}</td>";
                $html .= "<td>{$familia}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'producto\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'producto\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "ventaja":
                $name = "{$url}/{$datos["icon"]}?time=" . time();
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'ventaja\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'ventaja\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "aplicacion":
                $html = "<td><a href='https://www.youtube.com/watch?v={$datos["video"]}' target='blank'>https://www.youtube.com/watch?v={$datos["video"]}</a></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'aplicacion\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'aplicacion\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "pfamilia":
                $name = "{$url}/{$datos["image"]}?time=" . time();
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pfamilia\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pfamilia\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
            case "trabajo":
                $tipo = "";
                $familia = Pfamilia::find($datos["pfamilia_id"]);
                $name = "{$url}/{$datos["image"]}?time=" . time();
                if($datos["is_profesional"]) $tipo .= "Profesional";
                if($datos["is_particular"]) {
                    if(!empty($tipo)) $tipo .= " y ";
                    $tipo .= "Particular";
                }
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td>{$familia["title"]}</td>";
                $html .= "<td>{$tipo}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'trabajo\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'trabajo\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
            case "servicio":
                $name = "{$url}/{$datos["icon"]}?time=" . time();
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'servicio\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'servicio\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
            case "pregunta":
                $html = "<td>{$datos["pregunta"]}</td>";
                $html .= "<td>{$datos["respuesta"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pregunta\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pregunta\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                
                break;
            case "distribuidor":
            case "mis_datos":
                $html = "";
                break;
        }
        return ["html" => $html, "id" => $data["id"]];
    }
    public function limpiarCaracteresEspeciales($string ){
        $string = htmlentities($string);
        $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        return $string;
    }
    public function adddataempresa(Request $request) {
        $datos = $request->all();
        $tipo = $datos["tipo"];
        unset($datos["tipo"]);
        unset($datos["_token"]);
        $html = $url = "";
        if($tipo == "data") {
            if(isset($datos["url"])) {
                $url = $datos["url"];
                unset($datos["url"]);
            }
            $data = EmpresaDato::first();
            if(!empty($data)) {
                $datos["logo_principal"] = $data["logo_principal"];
                $datos["logo_footer"] = $data["logo_footer"];
                $datos["favicon"] = $data["favicon"];
            }
            if(isset($datos["logotipo"])) {
                $file = $request->file('logotipo');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = "logotipo.{$extension}";
                    $path = public_path('img/logo/');
                    $name = "{$url}/logo/{$fileName}";
                    $file->move($path, $fileName);
                    $datos["logo_principal"] = "logo/{$fileName}";
                }
            }
            if(isset($datos["logotipoFooter"])) {
                $file = $request->file('logotipoFooter');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = "logotipoFooter.{$extension}";
                    $path = public_path('img/logo/');
                    $name = "{$url}/logo/{$fileName}";
                    $file->move($path, $fileName);
                    $datos["logo_footer"] = "logo/{$fileName}";
                }
            }
            if(isset($datos["favicon"])) {
                $file = $request->file('favicon');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = "favicon.{$extension}";
                    $path = public_path('img/logo/');
                    $name = "{$url}/logo/{$fileName}";
                    $file->move($path, $fileName);
                    $datos["favicon"] = "logo/{$fileName}";
                }
            }
            
            if(empty($data)) {
                EmpresaDato::create($datos);
            } else {
                $data->fill($datos);
                $data->save();
            }
        } else {
            $data = EmpresaContacto::first();

            if(empty($data)) {
                EmpresaContacto::create($datos);
            } else {
                $data->fill($datos);
                $data->save();
            }
        }
    }
    public function adddata(Request $request) {
        $datos = $request->all();
        $tipo = $datos["tipo"];
        unset($datos["tipo"]);
        unset($datos["_token"]);
        $fileName = null;
        $html = $url = "";
        if(isset($datos["url"])) {
            $url = $datos["url"];
            unset($datos["url"]);
        }
        
        if(isset($datos["icon"])) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            
            $path = public_path('img/uploads/');
            $name = "{$url}/uploads/{$fileName}";
            $file->move($path, $fileName);
            $datos["icon"] = "uploads/{$fileName}";
        }
        if(isset($datos["image"])) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;            
            if($tipo == "producto")
                $fileName = strtoupper($datos["codigo"]) . '-' . str_replace(" ","_",$datos["name"]) . '.' . $extension;
            $path = public_path('img/uploads/');
            $name = "{$url}/uploads/{$fileName}";
            $file->move($path, $fileName);
            $datos["image"] = "uploads/{$fileName}";
        }
        if(isset($datos["is_particular_input"]))
            unset($datos["is_particular_input"]);
        if(isset($datos["is_profesional_input"]))
            unset($datos["is_profesional_input"]);
        
        if($tipo == "pfamilia") {
            $datos["url"] = self::limpiarCaracteresEspeciales($datos["title"]);
            $datos["url"] = str_replace(" ","_",$datos["url"]);
            $datos["url"] = strtolower($datos["url"]);
        }
        switch($tipo) {
            case "usuario":
                $datos["is_admin"] = 0;
                $datos["password"] = Hash::make($datos["password"]);
                $tipo = "Usuario";
                $nivel = $datos["nivel"];
                unset($datos["nivel"]);
                if($nivel == 2) {
                    $datos["is_admin"] = 1;
                    $tipo = "Administrador";
                }
                $OBJ = User::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>{$datos["name"]}</td>";
                    $html .= "<td>{$datos["username"]}</td>";
                    $html .= "<td>{$tipo}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'usuario\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'usuario\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "sliderhome":
                $datos["tipo"] = "home";
                $OBJ = Slider::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["texto"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "sliderempresa":
                $datos["tipo"] = "empresa";
                $OBJ = Slider::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["texto"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "producto":
                $cantidad = $datos["cantidadColor"];
                $Arr_colores = [];
                unset($datos["cantidadColor"]);
                for($i = 1; $i <= $cantidad; $i++) {
                    if(!isset($datos["title-{$i}"]))
                        continue;
                    $Arr_colores[] = [
                        "name" => $datos["title-{$i}"],
                        "code" => $datos["codigo-{$i}"],
                        "order" => $datos["order-{$i}"],
                        "descripcion" => $datos["descripcion-{$i}"],
                        "image" => $datos["image-{$i}"],
                        "image_text" => $datos["image_text-{$i}"],
                        "file" => $request->file('image-{$i}')
                    ];
                    unset($datos["title-{$i}"]);
                    unset($datos["codigo-{$i}"]);
                    unset($datos["descripcion-{$i}"]);
                    unset($datos["image-{$i}"]);
                    unset($datos["image_text-{$i}"]);
                    // print_r($Arr_colores);
                }

                $OBJ = Producto::create($datos);

                for($i = 0; $i < count($Arr_colores); $i++) {
                    $file = $Arr_colores[$i]["image"];
                    $extension = $file->getClientOriginalExtension();
                    $fileName = strtoupper($Arr_colores[$i]["code"]) . '-' . str_replace(" ","_",$Arr_colores[$i]["name"]) . '.' . $extension;
                    $path = public_path('img/uploads/');
                    $name = "{$url}/uploads/{$fileName}";
                    $file->move($path, $fileName);
                    $Arr_colores[$i]["image"] = "uploads/{$fileName}";
                    $Arr_colores[$i]["producto_id"] = $OBJ["id"];
                    Colorproducto::create($Arr_colores[$i]);
                }

                $familia = Pfamilia::find($datos["pfamilia_id"])["title"];
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>{$datos["codigo"]}</td>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["name"]}</td>";
                    $html .= "<td class='text-center'>{$familia}</td>";
                    $html .= "<td>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'producto\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'producto\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "ventaja":
                $OBJ = Ventaja::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'ventaja\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'ventaja\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "pfamilia":
                $datos["url"] = self::limpiarCaracteresEspeciales($datos["title"]);
                $datos["url"] = str_replace(" ","_",$datos["url"]);
                $datos["url"] = strtolower($datos["url"]);
        
                $OBJ = Pfamilia::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pfamilia\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pfamilia\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "pregunta":
                $OBJ = Pregunta::create($datos);

                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>{$datos["pregunta"]}</td>";
                    $html .= "<td>{$datos["respuesta"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pregunta\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pregunta\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "aplicacion":
                $OBJ = Aplicacion::create($datos);

                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><a href='https://www.youtube.com/watch?v={$datos["video"]}' target='blank'>https://www.youtube.com/watch?v={$datos["video"]}</a></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'aplicacion\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'aplicacion\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "trabajo":
                $tipo = "";
                $OBJ = Trabajo::create($datos);
                $familia = Pfamilia::find($datos["pfamilia_id"]);
                if($datos["is_profesional"]) $tipo .= "Profesional";
                if($datos["is_particular"]) {
                    if(!empty($tipo)) $tipo .= " y ";
                    $tipo .= "Particular";
                }
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td>{$familia["title"]}</td>";
                    $html .= "<td>{$tipo}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'trabajo\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'trabajo\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "servicio":
                $OBJ = Servicio::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'servicio\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'servicio\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "distribuidor":
                // $datos["longitud"] = 0;
                // $datos["latitud"] = 0;
                Distribuidor::create($datos);
                $html = "";
                break;
        }
        return $html;
    }
    public function erase($tipo,$id) {
        $data = self::data($tipo,$id);
        $data->delete();
    }
}
