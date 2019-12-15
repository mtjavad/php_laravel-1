<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey='id';
    protected $guarded=['id'];
    public $timestamps=false;
}
