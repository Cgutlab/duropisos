<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pfamilia extends Model
{
    protected $fillable = [
        'image',
        'title',
        'order',
        'url'
    ];
}
