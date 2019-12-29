<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class LoginController extends Controller
{
    public function authentificate (UsuarioRequest $request) {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $title = "";
            return view('adm.adm',compact('title'))->
            with('usuario',$request);
        }
        else{
            // flash('')->error()->important();
            Session::put('error', 'Credenciales incorrectas');
            return redirect()->route('login');
            
        }
    }

    public function logout(){
        Auth::logout();
    	return redirect()->to('/adm');
    }
}
