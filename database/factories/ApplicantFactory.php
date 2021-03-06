<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

class ApplicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Applicant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'job_title' => $this->faker->jobTitle,
            'email' => $this->faker->unique()->safeEmail,
            'password' => generateRandomString(24), // password
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->dateTime,
            'cover_letter' =>$this->faker->text,
            'role_id' => 1,
            'company_name' => $this->faker->company,
            'image_id' => $this->faker->numberBetween(1,203),
            'remember_token' => Str::random(10),
        ];
    }
}
