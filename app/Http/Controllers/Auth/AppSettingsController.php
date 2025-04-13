<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    public function index()
    {
        return view("auth.app-settings");
    }
}
