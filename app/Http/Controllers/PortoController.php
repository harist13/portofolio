<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyek;
use App\Models\pengguna;

class PortoController extends Controller
{
    //
    public function index()
    { 
        $proyek = proyek::all();
        return view('Porto', compact('proyek'));
    }
}
