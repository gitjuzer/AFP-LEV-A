<?php

namespace Afp\Data;

use Afp\Shared\Helpers\UserTypeEnum;

class FakerUser
{
    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('hu_HU');
    }

    public function findById($id)
    {
        $type = $this->faker->randomElement([UserTypeEnum::ADMIN, UserTypeEnum::TEACHER, UserTypeEnum::STUDENT]);
        $row = [
            'id' => $id,
            'loginName' => $this->faker->userName,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'type' => $type
        ];
        return $row;
    }
}