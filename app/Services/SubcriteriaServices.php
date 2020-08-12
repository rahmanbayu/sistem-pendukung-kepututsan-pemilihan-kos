<?php

namespace App\Services;

use App\Helpers\RoundValue;

class SubcriteriaServices
{
  public static function getTitleAndTable($id)
  {
    if ($id == 1) {
      return [
        'Sangat Murah',
        'Murah',
        'Sedang',
        'Mahal',
        'Sangat Mahal',
        'Harga'
      ];
    } elseif ($id == 2) {
      return [
        'Sangat Dekat',
        'Dekat',
        'Sedang',
        'Jauh',
        'Sangat Jauh',
        'Jarak'
      ];
    } elseif ($id == 3) {
      return [
        '>6',
        '5-6',
        '3-4',
        '1-2',
        '0',
        'Fasilitas'
      ];
    } elseif ($id == 4) {
      return [
        '7x7',
        '6x6',
        '5x5',
        '4x4',
        '4x4',
        'Luas'
      ];
    }
  }

  public static function getOposite($subcriteria)
  {
    $data = [];
    $subcriteria = $subcriteria->toArray();
    $subcriteria = collect($subcriteria)->except('id', 'admin_id', 'created_at', 'updated_at');

    foreach ($subcriteria as $key => $value) {
      $string = explode('_', $key);
      $newKey = $string[1] . '_' . $string[0];

      $data[$newKey] = round(1 / $value, 5);
    }

    return $data;
  }

  public static function getJumlahKolom($subcriteria, $oposite)
  {
    $jumlahkolom = [
      'sbaik' => 1 + $oposite['baik_sbaik'] + $oposite['sedang_sbaik'] + $oposite['kurang_sbaik'] + $oposite['skurang_sbaik'],
      'baik' => $subcriteria['sbaik_baik'] + 1 + $oposite['sedang_baik'] + $oposite['kurang_baik'] + $oposite['skurang_baik'],
      'sedang' => $subcriteria['sbaik_sedang'] + $subcriteria['baik_sedang'] + 1 + $oposite['kurang_sedang'] + $oposite['skurang_sedang'],
      'kurang' => $subcriteria['sbaik_kurang'] + $subcriteria['baik_kurang'] + $subcriteria['sedang_kurang'] + 1 + $oposite['skurang_kurang'],
      'skurang' => $subcriteria['sbaik_skurang'] + $subcriteria['baik_skurang'] + $subcriteria['sedang_skurang'] + $subcriteria['kurang_skurang'] + 1
    ];

    return $jumlahkolom;
  }

  public static function getNormalisasi($subcriteria, $oposite, $jumlahkolom)
  {
    $normalisasi = [
      'sbaik_sbaik' => 1 / $jumlahkolom['sbaik'],
      'baik_sbaik' => $oposite['baik_sbaik'] / $jumlahkolom['sbaik'],
      'sedang_sbaik' => $oposite['sedang_sbaik'] / $jumlahkolom['sbaik'],
      'kurang_sbaik' => $oposite['kurang_sbaik'] / $jumlahkolom['sbaik'],
      'skurang_sbaik' => $oposite['skurang_sbaik'] / $jumlahkolom['sbaik'],

      'sbaik_baik' => $subcriteria['sbaik_baik'] / $jumlahkolom['baik'],
      'baik_baik' => 1 / $jumlahkolom['baik'],
      'sedang_baik' => $oposite['sedang_baik'] / $jumlahkolom['baik'],
      'kurang_baik' => $oposite['kurang_baik'] / $jumlahkolom['baik'],
      'skurang_baik' => $oposite['skurang_baik'] / $jumlahkolom['baik'],

      'sbaik_sedang' => $subcriteria['sbaik_sedang'] / $jumlahkolom['sedang'],
      'baik_sedang' => $subcriteria['baik_sedang'] / $jumlahkolom['sedang'],
      'sedang_sedang' => 1 / $jumlahkolom['sedang'],
      'kurang_sedang' => $oposite['kurang_sedang'] / $jumlahkolom['sedang'],
      'skurang_sedang' => $oposite['skurang_sedang'] / $jumlahkolom['sedang'],

      'sbaik_kurang' => $subcriteria['sbaik_kurang'] / $jumlahkolom['kurang'],
      'baik_kurang' => $subcriteria['baik_kurang'] / $jumlahkolom['kurang'],
      'sedang_kurang' => $subcriteria['sedang_kurang'] / $jumlahkolom['kurang'],
      'kurang_kurang' => 1 / $jumlahkolom['kurang'],
      'skurang_kurang' => $oposite['skurang_kurang'] / $jumlahkolom['kurang'],

      'sbaik_skurang' => $subcriteria['sbaik_skurang'] / $jumlahkolom['skurang'],
      'baik_skurang' => $subcriteria['baik_skurang'] / $jumlahkolom['skurang'],
      'sedang_skurang' => $subcriteria['sedang_skurang'] / $jumlahkolom['skurang'],
      'kurang_skurang' => $subcriteria['kurang_skurang'] / $jumlahkolom['skurang'],
      'skurang_skurang' => 1 / $jumlahkolom['skurang'],
    ];

    return RoundValue::round($normalisasi);
  }

  public static function getJumlahBaris($normalisasi)
  {
    return [
      'sbaik' => $normalisasi['sbaik_sbaik'] + $normalisasi['sbaik_baik'] + $normalisasi['sbaik_sedang'] + $normalisasi['sbaik_kurang'] + $normalisasi['sbaik_skurang'],
      'baik' => $normalisasi['baik_sbaik'] + $normalisasi['baik_baik'] + $normalisasi['baik_sedang'] + $normalisasi['baik_kurang'] + $normalisasi['baik_skurang'],
      'sedang' => $normalisasi['sedang_sbaik'] + $normalisasi['sedang_baik'] + $normalisasi['sedang_sedang'] + $normalisasi['sedang_kurang'] + $normalisasi['sedang_skurang'],
      'kurang' => $normalisasi['kurang_sbaik'] + $normalisasi['kurang_baik'] + $normalisasi['kurang_sedang'] + $normalisasi['kurang_kurang'] + $normalisasi['kurang_skurang'],
      'skurang' => $normalisasi['skurang_sbaik'] + $normalisasi['skurang_baik'] + $normalisasi['skurang_sedang'] + $normalisasi['skurang_kurang'] + $normalisasi['skurang_skurang'],
    ];
  }

  public static function getPrioritas($jumlahbaris)
  {
    $prioritas = [
      'sbaik' => $jumlahbaris['sbaik'] / 5,
      'baik' => $jumlahbaris['baik'] / 5,
      'sedang' => $jumlahbaris['sedang'] / 5,
      'kurang' => $jumlahbaris['kurang'] / 5,
      'skurang' => $jumlahbaris['skurang'] / 5,
    ];
    return RoundValue::round($prioritas);
  }

  public static function getReports($jumlahkolom, $prioritas)
  {
    $lambdamax = ($jumlahkolom['sbaik'] * $prioritas['sbaik']) + ($jumlahkolom['baik'] * $prioritas['baik']) + ($jumlahkolom['sedang'] * $prioritas['sedang']) + ($jumlahkolom['kurang'] * $prioritas['kurang']) + ($jumlahkolom['skurang'] * $prioritas['skurang']);
    $ci = ($lambdamax - 5) / (5 - 1);
    $cr = $ci / 1.12;
    return  [
      'lambdamax' => $lambdamax,
      'ci' => $ci,
      'cr' => $cr
    ];
  }
}
