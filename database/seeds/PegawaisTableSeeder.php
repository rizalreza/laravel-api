<?php

use Illuminate\Database\Seeder;

class PegawaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pegawai::class, 50)->create();
    }
}
