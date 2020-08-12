<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subcriteria\UpdateSubcriteriaRequest;
use App\Services\SubcriteriaServices;
use App\Subcriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcriteriaController extends Controller
{
    public function index(Subcriteria $subcriteria)
    {
        $titleandtable = SubcriteriaServices::getTitleAndTable($subcriteria->id);
        $oposite = SubcriteriaServices::getOposite($subcriteria);
        $jumlahkolom = SubcriteriaServices::getJumlahKolom($subcriteria, $oposite);
        $normalisasi = SubcriteriaServices::getNormalisasi($subcriteria, $oposite,  $jumlahkolom);
        $jumlahbaris = SubcriteriaServices::getJumlahBaris($normalisasi);
        $prioritas = SubcriteriaServices::getPrioritas($jumlahbaris);
        $reports = SubcriteriaServices::getReports($jumlahkolom, $prioritas);

        return view('admin.subcriteria', ['subcriteria' => $subcriteria, 'titleandtable' => $titleandtable, 'oposite' => $oposite, 'jumlahkolom' => $jumlahkolom, 'normalisasi' => $normalisasi, 'jumlahbaris' => $jumlahbaris, 'prioritas' => $prioritas, 'reports' => $reports]);
    }

    public function update(UpdateSubcriteriaRequest $request, Subcriteria $subcriteria)
    {
        $data = $request->validated();
        $data['admin_id'] = Auth::id();

        $subcriteria->update($data);

        session()->flash('success', 'Nilai subcriteria berhasil di ubah.');
        return redirect()->back();
    }
}
