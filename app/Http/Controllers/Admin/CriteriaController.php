<?php

namespace App\Http\Controllers\Admin;

use App\Criteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\Criteria\UpdateCriteriaRequest;
use App\Services\CriteriaServices;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criteria = Criteria::first();
        $jumlahkolom = CriteriaServices::getJumlahKolom($criteria);
        $normalisasi = CriteriaServices::getNormalisasi($criteria, $jumlahkolom);
        $jumlahbaris = CriteriaServices::getJumlahBaris($normalisasi);
        $prioritas = CriteriaServices::getPrioritas($jumlahbaris);
        $reports = CriteriaServices::getReports($jumlahkolom, $prioritas);

        return view('admin.criteria', ['criteria' => $criteria, 'jumlahkolom' => $jumlahkolom, 'normalisasi' => $normalisasi, 'jumlahbaris' => $jumlahbaris, 'prioritas' => $prioritas, 'reports' => $reports]);
    }

    public function update(UpdateCriteriaRequest $request)
    {
        if ($request->baris != $request->kolom) {
            $criteria = Criteria::first();
            $criteria->updateField($request->validated());
            session()->flash('success', 'Nilai pada baris ' . $request->baris . ' dan kolom ' . $request->kolom . ' berhasil di ubah.');
        } else {
            session()->flash('failed', 'Baris dan kolom yang sama memiliki nilai default 1.');
        }

        return redirect()->back();
    }
}
