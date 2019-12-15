<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_shop','shop_id','product_id')
            ->withPivot(['price','amount']);
    }
}
