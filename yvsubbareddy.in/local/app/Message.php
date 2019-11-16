<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table = 'message';
    public $timestamps = false;
    protected $fillable =  ['message','createdAt','createdBy'];
}

