<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Cache;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $data = [];

        $data['category'] = CategoryProduct::where('slug', $slug)->first();
        abort_if($data['category'] === null, 404);

        return view("front-end.category", $data);
    }
}
