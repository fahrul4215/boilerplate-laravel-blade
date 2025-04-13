<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category, $slug)
    {
        $data = [];

        $data["category"] = CategoryProduct::where('slug', $category)->first();
        abort_if(is_null($data["category"]), 404);

        $data['product'] = Product::active()->where('slug', $slug)->first();
        abort_if(is_null($data['product']), 404);

        return view("front-end.product", $data);
    }
}
