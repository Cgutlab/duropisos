<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Slider;

class SlidersController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($section)
    {
        $title = "Slider: " . strtoupper($section);
        $section = $section;
        $sliders = Slider::where('tipo',$section)->get();
        
        return view('adm.sliders.edit', compact('section','title','sliders'));
    }

}
