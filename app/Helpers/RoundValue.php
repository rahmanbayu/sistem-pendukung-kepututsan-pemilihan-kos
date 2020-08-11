<?php

namespace App\Helpers;

class RoundValue
{
  public static function round($arr)
  {
    $data = [];
    foreach ($arr as $key => $val) {
      $data[$key] = round($val, 5);
    }
    return $data;
  }
}
