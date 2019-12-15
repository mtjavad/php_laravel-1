<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name'];

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_category','category_id','book_id')->withTimestamps();
    }
}
