<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        // cache 12 hours
        $data["headline"] = Cache::remember('home_headline', config('cache.default'), function () {
            return CategoryProduct::has('products')
                ->with([
                    'products' => function ($query) {
                        $query->with(['images'])->limit(1);
                    }
                ])->get();
        });

        $data['products'] = Product::active()->onStock()->take(12)->get();

        // dd($data['headline']->toArray());
        return view("front-end.home", $data);
    }
}
