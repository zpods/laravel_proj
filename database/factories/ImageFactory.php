<?php
namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        $images = [
            '1'=>'cater-yang-maz7yW85tY8-unsplash_300',
            '2'=>'jakob-owens-esbfaHABh7Y-unsplash_300',
            '3'=>'joanna-kosinska-qcqmS0JG58Q-unsplash_300',
            '4'=>'kristina-evstifeeva-y3h6gh2fpaI-unsplash_300',
            '5'=>'lum3n--RBuQ2PK_L8-unsplash_300',
            '6'=>'nordwood-themes-Nv4QHkTVEaI-unsplash_300',
            '7'=>'emilio-garcia-ecm-8nNQ82s-unsplash_300',
            '8'=>'harry-grout-VghP75yXtWE-unsplash_300',
            '9'=>'himiway-bikes-yYyKvafDS64-unsplash_300',
            '10'=>'jonathan-cooper-Yct3eX5m6uw-unsplash_300',
            '11'=>'william-chiesurin-u1knuAHUQH0-unsplash_300',
            '12'=>'xps-2L-0vnCnzcU-unsplash_300',
            '13'=>'xps-YNliXm_hMn8-unsplash_300',
            '14'=>'xps-YNliXm_hMn8-unsplash_300',
        ];
            return [
            'description'=>$this->faker->text(10),
            'src' => '/unsplash/'. $images[$this->faker->numberBetween(1, 14)] . '.jpg',
        ];
    }
}
