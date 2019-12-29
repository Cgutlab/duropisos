<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pfamilia;
use App\Producto;

class ProductoController extends Controller
{
    public function edit($tipo) {
        if($tipo == "familia") {
            $title = "Página: " . strtoupper($tipo);
            $familias = Pfamilia::orderBy('order')->paginate(8);
            
            return view('adm.producto', compact('tipo','title','familias'));
        } else {
            $title = "Página: " . strtoupper("productos");
            $familias = Pfamilia::orderBy('order')->pluck('title', 'id');;
            $productos = Producto::orderBy('order')->get();
            return view('adm.producto', compact('tipo','title','familias','productos'));
        }
    }
}
