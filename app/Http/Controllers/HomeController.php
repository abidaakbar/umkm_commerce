<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application's home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // For now, this just shows a static welcome page.
        // Later, you could pass featured products to the view.
        return view('home');
    }
}

