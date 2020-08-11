<?php

namespace App\Services;

use App\Helpers\RoundValue;

class CriteriaServices
{
  public static function getJumlahKolom($criteria)
  {
    $jumlahKolom = [
      'harga' => 1 + $criteria->jarak_harga + $criteria->fasilitas_harga + $criteria->luas_harga,
      'jarak' => $criteria->harga_jarak + 1 + $criteria->fasilitas_jarak + $criteria->luas_jarak,
      'fasilitas' => $criteria->harga_fasilitas + $criteria->jarak_fasilitas + 1 + $criteria->luas_fasilitas,
      'luas' => $criteria->harga_luas + $criteria->jarak_luas + $criteria->fasilitas_luas + 1,
    ];
    return RoundValue::round($jumlahKolom);
  }

  public static function getNormalisasi($criteria, $jumlahKolom)
  {
    $normalisasi = [
      'harga_harga' => 1 / $jumlahKolom['harga'],
      'jarak_harga' => $criteria->jarak_harga / $jumlahKolom['harga'],
      'fasilitas_harga' => $criteria->fasilitas_harga / $jumlahKolom['harga'],
      'luas_harga' => $criteria->luas_harga / $jumlahKolom['harga'],

      'harga_jarak' => $criteria->harga_jarak / $jumlahKolom['jarak'],
      'jarak_jarak' => 1 / $jumlahKolom['jarak'],
      'fasilitas_jarak' => $criteria->fasilitas_jarak / $jumlahKolom['jarak'],
      'luas_jarak' => $criteria->luas_jarak / $jumlahKolom['jarak'],

      'harga_fasilitas' => $criteria->harga_fasilitas / $jumlahKolom['fasilitas'],
      'jarak_fasilitas' => $criteria->jarak_fasilitas / $jumlahKolom['fasilitas'],
      'fasilitas_fasilitas' => 1 / $jumlahKolom['fasilitas'],
      'luas_fasilitas' => $criteria->luas_fasilitas / $jumlahKolom['fasilitas'],

      'harga_luas' => $criteria->harga_luas / $jumlahKolom['luas'],
      'jarak_luas' => $criteria->jarak_luas / $jumlahKolom['luas'],
      'fasilitas_luas' => $criteria->fasilitas_luas / $jumlahKolom['luas'],
      'luas_luas' => 1 / $jumlahKolom['luas'],
    ];
    return RoundValue::round($normalisasi);
  }

  public static function getJumlahBaris($normalisasi)
  {
    $jumlahbaris = [
      'harga' => $normalisasi['harga_harga'] + $normalisasi['harga_jarak'] + $normalisasi['harga_fasilitas'] + $normalisasi['harga_luas'],
      'jarak' => $normalisasi['jarak_harga'] + $normalisasi['jarak_jarak'] + $normalisasi['jarak_fasilitas'] + $normalisasi['jarak_luas'],
      'fasilitas' => $normalisasi['fasilitas_harga'] + $normalisasi['fasilitas_jarak'] + $normalisasi['fasilitas_fasilitas'] + $normalisasi['fasilitas_luas'],
      'luas' => $normalisasi['luas_harga'] + $normalisasi['luas_jarak'] + $normalisasi['luas_fasilitas'] + $normalisasi['luas_luas'],
    ];
    return RoundValue::round($jumlahbaris);
  }

  public static function getPrioritas($jumlahbaris)
  {
    $prioritas = [
      'harga' => $jumlahbaris['harga'] / 4,
      'jarak' => $jumlahbaris['jarak'] / 4,
      'fasilitas' => $jumlahbaris['fasilitas'] / 4,
      'luas' => $jumlahbaris['luas'] / 4
    ];
    return RoundValue::round($prioritas);
  }

  public static function getReports($jumlahKolom, $prioritas)
  {
    $lamda = ($jumlahKolom['harga'] * $prioritas['harga']) + ($jumlahKolom['jarak'] * $prioritas['jarak']) + ($jumlahKolom['fasilitas'] * $prioritas['fasilitas']) + ($jumlahKolom['luas'] * $prioritas['luas']);
    $ci = ($lamda - 4) / (4 - 1);
    $cr = $ci / 0.9;

    return [
      'lamda' => $lamda,
      'ci' => $ci,
      'cr' => $cr
    ];
  }
}
