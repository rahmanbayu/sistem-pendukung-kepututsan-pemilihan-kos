<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DataController extends Controller
{
    public function index()
    {
        $datakos = json_decode(Cookie::get('data_kos'));
        return view('data.index', ['datakos' => $datakos]);
    }

    public function edit($index)
    {
        $datakos = json_decode(Cookie::get('data_kos'))[$index];
        return view('data.edit', ['datakos' => $datakos, 'index' => $index]);
    }
}
