<?php

use App\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'admin_id' => 1,
            'harga_jarak' => 3,
            'harga_fasilitas' => 3,
            'harga_luas' => 3,
            'jarak_harga' => 3,
            'jarak_fasilitas' => 3,
            'jarak_luas' => 3,
            'fasilitas_harga' => 3,
            'fasilitas_jarak' => 3,
            'fasilitas_luas' => 3,
            'luas_harga' => 3,
            'luas_jarak' => 3,
            'luas_fasilitas' => 3,
        ]);
    }
}
