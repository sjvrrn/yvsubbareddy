<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contacts';
    protected $fillable =  ['name','mobile','email','message'];
}