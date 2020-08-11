<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criteria';

    public function updateField($request)
    {
        $index = $request['baris'] . '_' . $request['kolom'];
        $oposite = $request['kolom'] . '_' . $request['baris'];

        $criteria = $this->first();
        $criteria[$index] = $request['nilai'];
        $criteria[$oposite] = round(1 / $request['nilai'], 5);

        $criteria->save();
    }
}
