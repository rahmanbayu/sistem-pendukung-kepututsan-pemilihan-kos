<?php

namespace App\Services;

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
}
