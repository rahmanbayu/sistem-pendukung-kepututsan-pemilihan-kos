<?php

namespace App\Services;

use App\Criteria;
use App\Subcriteria;

class DataServices
{
  public static function  getRanking($datakos)
  {
    $ranking = [];
    $criteriaPrioritas = self::getCriteriaPrioritas();

    if (!$datakos) {
      $datakos = [];
    }

    foreach ($datakos as $key => $kos) {
      $prioritas = self::getPrioritas($kos);
      $ranking[$key] = [
        'name' => $kos->name,
        'nilai' => ($prioritas['harga'] * $criteriaPrioritas['harga']) + ($prioritas['jarak'] * $criteriaPrioritas['jarak']) + ($prioritas['fasilitas'] * $criteriaPrioritas['fasilitas']) + ($prioritas['luas'] * $criteriaPrioritas['luas']),
      ];
    }

    return $ranking;
  }

  public static function getPrioritas($kos)
  {
    $AllPrioritas = self::getSubcriteriaPrioritas();
    $prioritasEachKos = [];

    if ($kos->harga > 600000) {
      $prioritasEachKos['harga'] = $AllPrioritas['harga']['skurang'];
    } elseif ($kos->harga > 500000 && $kos->harga <= 600000) {
      $prioritasEachKos['harga'] = $AllPrioritas['harga']['kurang'];
    } else if ($kos->harga > 400000 && $kos->harga <= 500000) {
      $prioritasEachKos['harga'] = $AllPrioritas['harga']['sedang'];
    } else if ($kos->harga > 300000 && $kos->harga <= 400000) {
      $prioritasEachKos['harga'] = $AllPrioritas['harga']['baik'];
    } elseif ($kos->harga <= 300000) {
      $prioritasEachKos['harga'] = $AllPrioritas['harga']['sbaik'];
    }

    if ($kos->jarak > 1000) {
      $prioritasEachKos['jarak'] = $AllPrioritas['jarak']['skurang'];
    } elseif ($kos->jarak > 750 && $kos->jarak <= 1000) {
      $prioritasEachKos['jarak'] = $AllPrioritas['jarak']['kurang'];
    } else if ($kos->jarak > 500 && $kos->jarak <= 750) {
      $prioritasEachKos['jarak'] = $AllPrioritas['jarak']['sedang'];
    } else if ($kos->jarak > 250 && $kos->jarak <= 500) {
      $prioritasEachKos['jarak'] = $AllPrioritas['jarak']['baik'];
    } elseif ($kos->jarak <= 250) {
      $prioritasEachKos['jarak'] = $AllPrioritas['jarak']['sbaik'];
    }

    if ($kos->fasilitas == '0') {
      $prioritasEachKos['fasilitas'] = $AllPrioritas['fasilitas']['skurang'];
    } elseif ($kos->fasilitas == '1-2') {
      $prioritasEachKos['fasilitas'] = $AllPrioritas['fasilitas']['kurang'];
    } else if ($kos->fasilitas == '3-4') {
      $prioritasEachKos['fasilitas'] = $AllPrioritas['fasilitas']['sedang'];
    } else if ($kos->fasilitas == '5-6') {
      $prioritasEachKos['fasilitas'] = $AllPrioritas['fasilitas']['baik'];
    } elseif ($kos->fasilitas == '>6') {
      $prioritasEachKos['fasilitas'] = $AllPrioritas['fasilitas']['sbaik'];
    }

    if ($kos->luas == '3x3') {
      $prioritasEachKos['luas'] = $AllPrioritas['luas']['skurang'];
    } elseif ($kos->luas == '4x4') {
      $prioritasEachKos['luas'] = $AllPrioritas['luas']['kurang'];
    } else if ($kos->luas == '5x5') {
      $prioritasEachKos['luas'] = $AllPrioritas['luas']['sedang'];
    } else if ($kos->luas == '6x6') {
      $prioritasEachKos['luas'] = $AllPrioritas['luas']['baik'];
    } elseif ($kos->luas == '7x7') {
      $prioritasEachKos['luas'] = $AllPrioritas['luas']['sbaik'];
    }

    return $prioritasEachKos;
  }

  public static function getSubcriteriaPrioritas()
  {
    $harga = Subcriteria::find(1);
    $jarak = Subcriteria::find(2);
    $fasilitas = Subcriteria::find(3);
    $luas = Subcriteria::find(4);

    $opositeHarga = SubcriteriaServices::getOposite($harga);
    $jumlahkolomHarga = SubcriteriaServices::getJumlahKolom($harga, $opositeHarga);
    $normalisasiHarga = SubcriteriaServices::getNormalisasi($harga, $opositeHarga,  $jumlahkolomHarga);
    $jumlahbarisHarga = SubcriteriaServices::getJumlahBaris($normalisasiHarga);
    $prioritasHarga = SubcriteriaServices::getPrioritas($jumlahbarisHarga);

    $opositeJarak = SubcriteriaServices::getOposite($jarak);
    $jumlahkolomJarak = SubcriteriaServices::getJumlahKolom($jarak, $opositeJarak);
    $normalisasiJarak = SubcriteriaServices::getNormalisasi($jarak, $opositeJarak,  $jumlahkolomJarak);
    $jumlahbarisJarak = SubcriteriaServices::getJumlahBaris($normalisasiJarak);
    $prioritasJarak = SubcriteriaServices::getPrioritas($jumlahbarisJarak);

    $opositeFasilitas = SubcriteriaServices::getOposite($fasilitas);
    $jumlahkolomFasilitas = SubcriteriaServices::getJumlahKolom($fasilitas, $opositeFasilitas);
    $normalisasiFasilitas = SubcriteriaServices::getNormalisasi($fasilitas, $opositeFasilitas,  $jumlahkolomFasilitas);
    $jumlahbarisFasilitas = SubcriteriaServices::getJumlahBaris($normalisasiFasilitas);
    $prioritasFasilitas = SubcriteriaServices::getPrioritas($jumlahbarisFasilitas);

    $opositeLuas = SubcriteriaServices::getOposite($luas);
    $jumlahkolomLuas = SubcriteriaServices::getJumlahKolom($luas, $opositeLuas);
    $normalisasiLuas = SubcriteriaServices::getNormalisasi($luas, $opositeLuas,  $jumlahkolomLuas);
    $jumlahbarisLuas = SubcriteriaServices::getJumlahBaris($normalisasiLuas);
    $prioritasLuas = SubcriteriaServices::getPrioritas($jumlahbarisLuas);

    return [
      'harga' => $prioritasHarga,
      'jarak' => $prioritasJarak,
      'fasilitas' => $prioritasFasilitas,
      'luas' => $prioritasLuas
    ];
  }

  public static function getCriteriaPrioritas()
  {
    $criteria = Criteria::first();
    $jumlahkolom = CriteriaServices::getJumlahKolom($criteria);
    $normalisasi = CriteriaServices::getNormalisasi($criteria, $jumlahkolom);
    $jumlahbaris = CriteriaServices::getJumlahBaris($normalisasi);
    $prioritas = CriteriaServices::getPrioritas($jumlahbaris);

    return $prioritas;
  }
}
