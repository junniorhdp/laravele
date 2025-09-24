<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function membresia()
    {
        return view('pages.membresia');
    }

    public function contacto()
    {
        return view('pages.contacto');
    }

    public function nosotros()
    {
        return view('pages.nosotros');
    }
}
