<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    public $table = 'slides';
    public $timestamps = false;
    protected $fillable =  ['path','type','createdAt','createdBy'];
}

