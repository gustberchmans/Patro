<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('publicatiedatum', 'desc')->get();
        return view('admin.newsfeed', compact('artikels'));
    }
}
