<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Metadato;

class MetadatosController extends Controller
{
    public function index() {
        $seccion = "Metadatos del sitio";
        $title = "Página: " . strtoupper("metadatos");
        $metadato = Metadato::first();
        
        return view('adm.metadatos', compact('title','seccion','metadato'));
    }
    public function edit(Request $request) {
        $data = $request->all();
        unset($data["frm_id"]);
        unset($data["tipo"]);
        $metadato = Metadato::first();

        $metadato->fill($data);
        $metadato->save();
        return $data;
    }
}
