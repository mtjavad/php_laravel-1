<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'shop_id' => 'required',
            'price' => 'required|numeric',
            'amount' => 'required|numeric'
        ], [
                'name.required' => 'وارد کردن نام محصول ضروری است',
                'shop_id.required' => 'وارد کردن نام فروشگاه ضروری است',
                'price.required' => 'وارد کردن قیمت ضروری است',
                'price.numeric' => 'فرمت قیمت، باید عددی باشد',
                'amount.required' => 'وارد کردن مقدار ضروری است',
                'amount.numeric' => 'فرمت مقدار، باید عددی باشد',
            ]
        );
        $name = $request->input('name');
        $shop_id = $request->input('shop_id');
        $price = $request->input('price');
        $amount = $request->input('amount');
        $product = Product::create(['name' => $name]);
        $product->shops()->attach([$shop_id => ['price' => $price, 'amount' => $amount]]);
    }
}
