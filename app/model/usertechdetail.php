<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class usertechdetail extends Model
{
    protected $table="usertechdetail";
    protected $fillable=["user_id","techlangs_id"];
    
}
