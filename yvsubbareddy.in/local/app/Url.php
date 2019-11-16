<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $table = 'url';
    public $timestamps = false;
    protected $fillable =  ['url','userid'];
}

