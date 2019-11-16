<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public $table = 'visitors';
    protected $fillable =  ['name','uid','mobile','total_members','darshan_date','darshan_type','darshan_type_id','subdarshan_type_id','constituency','accom_date','reference','ref_name','status','staffstatus','remarks'];
}

