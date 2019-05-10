<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(3),
        'image'=>'uploads/product/7585748240_IMG_8708.jpg',
        'descriptino'=>$faker->paragraph(4),
        'price'=>$faker->numberBetween(100,10000)
    ];
});
