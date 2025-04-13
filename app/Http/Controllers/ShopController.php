<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $data = [];

        return view("front-end.shop", $data);
    }
}
