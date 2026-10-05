<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutPage::first();

        return view('home.about', compact('about'));
    }
}