<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'form';
    protected $fillable = ['nombre','telefono','email'];
}
