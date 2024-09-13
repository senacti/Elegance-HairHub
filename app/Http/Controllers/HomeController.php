<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra la página principal.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retorna la vista 'home' ubicada en 'resources/views/home.blade.php'
        return view('home');
    }
}
