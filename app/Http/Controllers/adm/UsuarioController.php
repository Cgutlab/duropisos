<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsuarioController extends Controller
{
    public function index($seccion) {
        if($seccion == "todos") {
            $seccion = "Usuarios del sistema";
            $title = "Página: " . strtoupper("usuarios");
            $usuarios = User::orderBy("name")->get();

            return view('adm.usuario.todos', compact('title','seccion','usuarios'));
        } else {
            $seccion = "Usuario";
            $title = "Página: " . strtoupper("Mis datos");
            $usuario = Auth::user();

            return view('adm.usuario.uno', compact('title','seccion','usuario'));
        }
    }
}
