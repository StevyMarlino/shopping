<?php

namespace Database\Factories\Models;

use App\Models\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Address::class, function (Faker $faker) {

            $professionnal = $this->faker->boolean();

            if(!$professionnal || ($professionnal && $this->faker->boolean())) {
                $name = $this->faker->lastName;
                $firstName = $this->faker->firstName;
            } else {
                $name = null;
                $firstName = null;
            }
        return [
            'professionnal' => $professionnal,
            'civility' => $this->faker->boolean() ? 'Mme':'M.',
            'name' => $name,
            'firstname' => $firstName,
            'company' => $professionnal ? $this->faker->company : null,
            'address' => $this->faker->streetAddress,
            'addressbis' => $this->faker->boolean() ? $this->faker->secondaryAddress : null,
            'bp' => $this->faker->boolean() ? $this->faker->numberBetween(100,900) : null,
            'postal' => $this->faker->numberBetween(10000,90000),
            'city' => $this->faker->city,
            'country_id' => mt_rand(1,4),
            'phone' => $this->faker->numberBetween(1000000000,9000000000),
        ];
    });
}