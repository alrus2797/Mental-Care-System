<?php



$factory->define(App\Presentacion::class,function(Faker\Generator $faker){
  return[
    'descripcion'=>$faker->realtext()
  ]
});


$factory->define(App\Medicina::class,function(Faker\Generator $faker){
  return[
  ]
});
 ?>
