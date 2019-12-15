<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;
    protected $dates=['published_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'book_category','book_id','category_id')->withTimestamps();
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class,'author_book','book_id','author_id')->withTimestamps();
    }
}
