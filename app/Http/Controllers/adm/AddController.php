<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ventaja;
use App\Pregunta;
use App\Aplicacion;
use App\Pfamilia;
use App\Trabajo;
class AddController extends Controller
{
    public function index($seccion) {
        $title = "Página: " . strtoupper($seccion);
        // dd($seccion);
        switch($seccion) {
            case "ventaja":
                $ventajas = Ventaja::orderBy('order')->paginate(8);
                return view('adm.add', compact('seccion','title','ventajas'));
                break;
            case "pregunta":
                $preguntas = Pregunta::orderBy('order')->paginate(8);
                return view('adm.add', compact('seccion','title','preguntas'));
                break;
            case "aplicacion":
                $aplicaciones = Aplicacion::orderBy('order')->paginate(8);
                return view('adm.add', compact('seccion','title','aplicaciones'));
                break;
            case "trabajo":
                $familias = Pfamilia::orderBy('order')->paginate(8)->pluck('title', 'id');
                $trabajos = Trabajo::orderBy('order')->paginate(8);
                $tipo = ["11" => "Profesional y Particular","01" => "Particular", "10" => "Profesional"];
                return view('adm.add', compact('seccion','title','familias','trabajos','tipo'));
                break;
        }
    }
}
