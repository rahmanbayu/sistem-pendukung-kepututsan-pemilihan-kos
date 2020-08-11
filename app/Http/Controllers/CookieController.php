<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cookies\SetCookieRequest;
use App\Http\Requests\Cookies\UpdateCookieRequest;
use App\Services\CookieServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use function GuzzleHttp\json_decode;

class CookieController extends Controller
{
    public function setCookie(SetCookieRequest $request)
    {
        if (Cookie::has('data_kos')) {
            $datakos = json_decode(Cookie::get('data_kos'));

            if (CookieServices::checkNameExist($request->name)) {
                session()->flash('failed', 'Nama kos sudah terdaftar.');
                return redirect()->back();
            }

            array_push($datakos, $request->validated());
            Cookie::queue(Cookie::forever('data_kos', json_encode($datakos)));
        } else {
            Cookie::queue(Cookie::forever('data_kos', json_encode([$request->validated()])));
        }

        session()->flash('success', 'Berhasil menambahkan data kos.');
        return redirect()->back();
    }

    public function deleteCookie($index)
    {
        $datakos = json_decode(Cookie::get('data_kos'));
        array_splice($datakos, $index, 1);
        Cookie::queue(Cookie::forever('data_kos', json_encode($datakos)));

        session()->flash('success', 'Berhasil menghapus data kos.');
        return redirect()->back();
    }

    public function updateCookie(UpdateCookieRequest $request, $index)
    {
        $datakos = json_decode(Cookie::get('data_kos'));

        if (CookieServices::checkNameExist($request->name) && $request->name != $datakos[$index]->name) {
            session()->flash('failed', 'Nama kos sudah terdaftar.');
            return redirect()->back();
        }

        $datakos[$index] = $request->validated();

        Cookie::queue(Cookie::forever('data_kos', json_encode($datakos)));

        session()->flash('success', 'Edit data kos berhasil.');
        return redirect()->route('data.index');
    }
}
