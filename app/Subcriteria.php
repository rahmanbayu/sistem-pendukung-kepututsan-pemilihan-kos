<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcriteria extends Model
{
    protected $table = 'subcriteria';

    protected $fillable = [
        'admin_id',
        'sbaik_baik',
        'sbaik_sedang',
        'sbaik_kurang',
        'sbaik_skurang',
        'baik_sedang',
        'baik_kurang',
        'baik_skurang',
        'sedang_kurang',
        'sedang_skurang',
        'kurang_skurang',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
