<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'file'
    ];
}
