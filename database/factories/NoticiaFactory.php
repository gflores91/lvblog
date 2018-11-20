<?php

use Faker\Generator as Faker;

$factory->define(lvblog\Models\Noticia::class, function (Faker $faker) {
    return [
        'titulo' => $faker->realText(random_int(10, 50)),
        'cuerpo' => $faker->realText(random_int(10, 100)),
        'imagen' => $faker->imageUrl(350, 150)
    ];
});
