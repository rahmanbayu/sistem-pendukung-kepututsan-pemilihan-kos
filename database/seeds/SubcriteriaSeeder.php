<?php

use App\Subcriteria;
use Illuminate\Database\Seeder;

class SubcriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++)
            Subcriteria::create([
                'admin_id' => 1,
                'sbaik_baik' => 3,
                'sbaik_sedang' => 3,
                'sbaik_kurang' => 3,
                'sbaik_skurang' => 3,
                'baik_sedang' => 3,
                'baik_kurang' => 3,
                'baik_skurang' => 3,
                'sedang_kurang' => 3,
                'sedang_skurang' => 3,
                'kurang_skurang' => 3,
            ]);
    }
}
