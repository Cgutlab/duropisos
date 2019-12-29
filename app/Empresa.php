<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'text',
        'link',
        'image_resume',
        'title_resume',
        'subtitle_resume',
        'text_resume',
        'link_resume'
    ];
}
