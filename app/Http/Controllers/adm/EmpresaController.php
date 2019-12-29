<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
use App\Distribuidor;
use App\Provincia;
use App\Localidad;
use App\EmpresaDato;
use App\EmpresaContacto;

class EmpresaController extends Controller
{
    public function datos(Request $request) {
        $title = "Página: " . strtoupper("datos de empresa");

        $empresaData = EmpresaDato::first();
        $empresaContacto = EmpresaContacto::first();

        $provincia = Provincia::find($empresaData["provincia_id"]);
        $localidad = Localidad::find($empresaData["localidad_id"]);
        $empresaData["provincia_id"] = $provincia["nombre"];
        $empresaData["localidad_id"] = $localidad["nombre"];
        $provincias = [];
        $ARRprovincias = Provincia::orderBy('id')->pluck('nombre', 'id');
        $provincias[] = ["id" => "","text" => ""];
        foreach($ARRprovincias AS $k => $v) {
            $provincias[] = ["id" => $k,"text" => $v];
        }

        return view('adm.empresa.datos', compact('title','provincias','empresaData','empresaContacto'));
    }
    public function data(Request $request) {
        $empresa = Empresa::first();
        $datos = $request->all();
        $image_text = "";
        $obj = [];
        $obj["image"] = "";
        $obj["title"] = "";
        $obj["subtitle"] = "";
        $obj["text"] = "";
        $obj["link"] = "";
        $obj["image_resume"] = "";
        $obj["title_resume"] = "";
        $obj["subtitle_resume"] = "";
        $obj["text_resume"] = "";
        $obj["link_resume"] = "";

        if($datos["frm_tipo"] == "home") {
            if(isset($datos["image_text"])) {
                $image_text = $datos["image_text"];
                unset($datos["image_text"]);
            }
            if(!empty($empresa)) {
                $obj["image"] = $empresa["image"];
                $obj["title"] = $empresa["title"];
                $obj["subtitle"] = $empresa["subtitle"];
                $obj["text"] = $empresa["text"];
                $obj["link"] = $empresa["link"];

                $obj["image_resume"] = $empresa["image_resume"];
            }

            if(!empty($image_text)) {
                if(isset($datos["image"])) {
                    $file = $request->file('image');
                    if(!is_null($file)) {
                        $extension = $file->getClientOriginalExtension();
                        $fileName = "empresa_home.{$extension}";
                        $path = public_path('img/uploads/');
                        $name = $path . $fileName;
                        $file->move($path, $fileName);
                        $obj["image_resume"] = "uploads/{$fileName}";
                    }
                }
            }
            $obj["title_resume"] = $datos["title"];
            $obj["subtitle_resume"] = $datos["subtitle"];
            $obj["text_resume"] = $datos["frm_texto"];
            $obj["link_resume"] = "";

            if(empty($empresa)) {
                $obj_r = Empresa::create($obj);
            } else {
                $empresa->fill($obj);
                $empresa->save();
            }
        } else {
            if(isset($datos["image_text"])) {
                $image_text = $datos["image_text"];
                unset($datos["image_text"]);
            }
            if(!empty($empresa)) {
                $obj["image_resume"] = $empresa["image_resume"];
                $obj["title_resume"] = $empresa["title_resume"];
                $obj["subtitle_resume"] = $empresa["subtitle_resume"];
                $obj["text_resume"] = $empresa["text_resume"];
                $obj["link_resume"] = $empresa["link_resume"];

                $obj["image"] = $empresa["image"];
            }
                

            if(!empty($image_text)) {
                if(isset($datos["image"])) {
                    $file = $request->file('image');
                    if(!is_null($file)) {
                        $extension = $file->getClientOriginalExtension();
                        $fileName = "empresa_index.{$extension}";
                        $path = public_path('img/uploads/');
                        $name = $path . $fileName;
                        $file->move($path, $fileName);
                        $obj["image"] = "uploads/{$fileName}";
                    }
                }
            }
            $obj["title"] = $datos["title"];
            $obj["subtitle"] = $datos["subtitle"];
            $obj["text"] = $datos["frm_texto"];
            $obj["link"] = "";

            if(empty($empresa)) {
                $obj_r = Empresa::create($obj);
            } else {
                $empresa->fill($obj);
                $empresa->save();
            }
        }
        return $obj;
    }

    public function datatable(Request $request) {
        $params = $request->all();
        $data = [];
        $recordsTotal = $recordsFiltered = 0;
        $limit = $params['length'];
        $offset = $params['start'];
        $Arr = Distribuidor::orderBy('local')
            ->skip($offset*$limit)->take($limit)->get();
            // ->offset()
            // ->limit();
            
        $recordsTotal = Distribuidor::orderBy('local')->count();
        $recordsFiltered = $recordsTotal;
        
        foreach($Arr AS $d) {
            $localidad = Localidad::find($d["localidad_id"]);
            $provincia = Provincia::find($d["provincia_id"]);
            $d["localidad"] = $localidad["nombre"];
            $d["provincia"] = $provincia["nombre"];
            $data[] = $d;
        }

        $json_data = array(
            "draw"            => intval( $params['draw'] ),
            "recordsTotal"    => intval( $recordsTotal ),//// en Vista
            "recordsFiltered" => intval( $recordsFiltered ),// en Total
            "data"            => $data
        );
        echo json_encode($json_data);
    }
}
