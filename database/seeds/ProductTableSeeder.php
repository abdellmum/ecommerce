<?php
use App\Products;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\factory::create();
      for($i=0;$i<30;$i++){
          Products::create([
            'tittle' => $faker -> sentence(3),
            'slug' => $faker -> slug,
            'subtittle' => $faker -> sentence(4),
            'description' => $faker -> text,
            'price'=>$faker->numberBetween(200,1500)*100,
            'image'=>'https://via.placeholder.com/200x250/0000FF/808080%20?Text=Digital.com%20C/O%20https://placeholder.com/'

          ]);



      }
    }
}
