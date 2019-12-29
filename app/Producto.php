<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'codigo',
        'image',
        'name',
        'order',
        'url',
        'descripcion',
        'presentacion',
        'ventaja',
        'color',
        'textura',
        'url_mercadolibre',
        'url_mercadopago',
        'is_particular',
        'is_profesional',
        'pfamilia_id'
    ];

    public function colores()
    {
        return $this->hasMany('App\Colorproducto')->orderBy('order');
    }
    
    public function texturas()
    {
        return $this->hasMany('App\Texturaproducto')->orderBy('order');
    }
}
