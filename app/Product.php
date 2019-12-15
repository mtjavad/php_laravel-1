<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name'];

    public function shops()
    {
        return $this->belongsToMany(Shop::class,'product_shop','product_id','shop_id')
            ->withPivot(['price','amount']);
    }
}
