<?php

namespace App\Http\Controllers\pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\EmpresaDato;
use App\EmpresaContacto;

use App\Provincia;
use App\Localidad;
use App\Slider;
use App\Pfamilia;
use App\Empresa;
use App\Servicio;

use App\Producto;

use App\Pregunta;

use App\Aplicacion;

use App\Ventaja;

use App\Distribuidor;

use App\Trabajo;

use App\Mail\Sendbymail;
use App\Mail\Sendrecuperar;
use App\Mail\SendCotizador;
use Illuminate\Support\Facades\Mail;

class Pagecontroller extends Controller
{
    public function index() {
        $empresa = EmpresaDato::first();
        $logo = $empresa["logo_principal"];
        $favicon = $empresa["favicon"];
        return view('welcome',compact('logo','favicon'));
    }
    public function particular() {
        $path = "particular";
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";
        $servicios = Servicio::orderBy('order')->get();

        $familias = Pfamilia::orderBy('order')->get();

        $sliders = Slider::where('tipo','home')->orderBy('order')->get();
        
        return view('public.basico.home',compact('path','logo','favicon','contacto','logoFooter','domicilio','sliders','familias','data','servicios'));
    }
    public function profesional() {
        $path = "profesional";
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";
        $servicios = Servicio::orderBy('order')->get();

        $familias = Pfamilia::orderBy('order')->get();

        $sliders = Slider::where('tipo','home')->orderBy('order')->get();
        
        return view('public.basico.home',compact('path','logo','favicon','contacto','logoFooter','domicilio','sliders','familias','data','servicios'));
    }

    public function empresa($path) {
        
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";
        $servicios = Servicio::orderBy('order')->get();

        $familias = Pfamilia::orderBy('order')->get();

        $sliders = Slider::where('tipo','empresa')->orderBy('order')->get();
        
        return view('public.basico.empresa',compact('path','logo','favicon','contacto','logoFooter','domicilio','sliders','familias','data','servicios'));
    }
    
    public function productos($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $familias = Pfamilia::orderBy('order')->get();
        
        return view('public.basico.productos',compact('path','logo','favicon','contacto','logoFooter','domicilio','familias'));
    }
    public function tipo($path,$tipo) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $familia = Pfamilia::where('url',$tipo)->first();
        $producto = Producto::where('pfamilia_id',$familia["id"]);
        if($path == "particular") {
            $producto = $producto->where('is_particular',1)->first();
            if(!empty($producto))
                $producto["colores"] = $producto->colores;
        }
        if($path == "profesional") {
            $producto = $producto->where('is_profesional',1)->first();
            if(!empty($producto))
                $producto["colores"] = $producto->colores;
        }
        
        $title = $familia["title"];

        return view('public.basico.producto',compact('title','path','logo','favicon','contacto','logoFooter','domicilio','producto'));
    }
    
    public function aplicacion($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $aplicaciones = Aplicacion::orderBy('order')->get();
        
        return view('public.basico.aplicacion',compact('path','logo','favicon','contacto','logoFooter','domicilio','aplicaciones'));
    }
    
    public function trabajos($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $trabajos = Trabajo::orderBy('order')->get();
        $familias = Pfamilia::orderBy('id')->pluck('title', 'id');
        
        return view('public.basico.trabajos',compact('path','logo','favicon','contacto','logoFooter','domicilio','trabajos','familias'));
    }
    public function preguntas($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $preguntas = Pregunta::orderBy('order')->get();
        
        return view('public.basico.preguntas',compact('path','logo','favicon','contacto','logoFooter','domicilio','preguntas'));
    }
    public function ventajas($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $ventajas = Ventaja::orderBy('order')->get();
        
        return view('public.basico.ventajas',compact('path','logo','favicon','contacto','logoFooter','domicilio','ventajas'));
    }
    public function contacto($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $url_map = "{$empresa["direccion"]}, {$provincia}, {$localidad}";
        
        return view('public.basico.contacto',compact('path','logo','favicon','contacto','logoFooter','domicilio','url_map'));
    }
    public function distribuidores($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $distribuidores = Distribuidor::get();
        $Arr_distribuidores = [];
        foreach($distribuidores AS $k => $v)
            $Arr_distribuidores[] = [$v["local"],$v["latitud"],$v["longitud"]];

        return view('public.basico.distribuidores',compact('path','logo','favicon','contacto','logoFooter','domicilio','Arr_distribuidores'));
    }

    public function mail(Request $request){
        $data = $request->all();
        //dd($data);
        $contacto = EmpresaContacto::first();

        
        Mail::send('emails.welcome', ["nombre" => $request["nombre"],"apellido" => $request["apellido"],"telefono" => $request["telefono"],"email" => $request["email"],"mensaje" => $mensaje = $request["mensaje"]], function ($message) {

            $message->from("corzo.pabloariel@gmail.com", "Formulario de contacto ");

            $message->to("corzo.pabloariel@gmail.com");


            //Add a subject
            $message->subject("Formulario de contacto");

        });
        if (Mail::failures()) {
            return back()
                ->withErrors(['mssg' => 'Ha ocurrido un error.']);
        }
        
        //flash('')->success()->important();
        return back()->withSuccess(['mssg' => 'El mensaje se ha enviado exitosamente.']);
    }
}
