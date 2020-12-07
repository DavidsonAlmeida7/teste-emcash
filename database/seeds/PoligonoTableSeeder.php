<?php

use App\Models\Poligono;
use Illuminate\Database\Seeder;

class PoligonoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Poligono::class, 10)->create();
    }
}
