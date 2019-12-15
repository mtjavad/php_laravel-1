<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name','birthdate'];

    public function books()
    {
        return $this->belongsToMany(Book::class,'author_book','author_id','book_id')->withTimestamps();
    }
}
