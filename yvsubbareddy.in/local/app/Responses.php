<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    public $table = 'responses';
    public  $timestamps = false;
    protected $fillable =  ['userid','response_id'];
}

