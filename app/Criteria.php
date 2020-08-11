<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Criteria extends Model
{
    protected $table = 'criteria';

    public function updateField($request)
    {
        $index = $request['baris'] . '_' . $request['kolom'];
        $oposite = $request['kolom'] . '_' . $request['baris'];

        $criteria = $this->first();
        $criteria[$index] = $request['nilai'];
        $criteria['admin_id'] = Auth::id();
        $criteria[$oposite] = round(1 / $request['nilai'], 5);

        $criteria->save();
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
