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

    public function findByEmail($email)
    {
        $type = $this->faker->randomElement([UserTypeEnum::ADMIN, UserTypeEnum::TEACHER, UserTypeEnum::STUDENT]);
        $row = [
            'id' => $this->faker->randomNumber(2),
            'loginName' => $this->faker->userName,
            'name' => $this->faker->name,
            'email' => $email,
            'password' => password_hash('Arjun@123', PASSWORD_DEFAULT),
            'type' => $type
        ];
        return $row;
    }

    public function store($fakeData = null)
    {
        return $this->faker->randomNumber(2);
    }
}