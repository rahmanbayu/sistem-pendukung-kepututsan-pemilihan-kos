<?php

namespace App\Http\Controllers;

use App\Services\DataServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DataController extends Controller
{
    public function index()
    {
        $datakos = json_decode(Cookie::get('data_kos'));
        if (!$datakos) {
            $datakos = [];
        }
        $ranking = DataServices::getRanking($datakos);
        return view('data.index', ['datakos' => $datakos, 'ranking' => $ranking]);
    }

    public function edit($index)
    {
        $datakos = json_decode(Cookie::get('data_kos'))[$index];
        return view('data.edit', ['datakos' => $datakos, 'index' => $index]);
    }
}
