<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

class CookieServices
{

  public static function checkNameExist($name)
  {
    $datakos = json_decode(Cookie::get('data_kos'));

    foreach ($datakos as $kos) {
      if ($kos->name == $name) {
        return true;
      }
    }
  }
}
