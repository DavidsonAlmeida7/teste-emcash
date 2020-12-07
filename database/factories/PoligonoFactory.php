<?php

use App\Models\Poligono;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Poligono::class, function (Faker $faker) {
    
    $tipo = rand(1, 10) % 2 == 0 ? 'retangulo' : 'triangulo';
    $base = rand(1, 10);
    $altura = rand(1, 10);

    return [
        'tipo' => $tipo,
        'base' => $base,
        'altura' => $altura,
        'area' => $tipo == 'retangulo' ? $base * $altura : $base * $altura / 2
    ];
});