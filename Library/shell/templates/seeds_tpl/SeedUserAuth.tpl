<?php

//Seed gerada automaticamente via Scooby_CLI em dateNow
require_once "../../vendor/autoload.php"; 

use Helpers\Seeders;
        
$faker = \Faker\Factory::create("pt_BR");
        
for ($i=0; $i < 10; $i++) { 
    $seeder = new Seeders();
    $seeder->seed("users", [
        "name" => $faker->name,
        "email" => $faker->email,
        "password" => \Helpers\Login::passwordHash($faker->password)
]);
}
