<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admController extends Controller
{
    public function index() {
        $title = "";
        // dd("adm");
        return view('adm.adm',compact('title'));
    }
}
