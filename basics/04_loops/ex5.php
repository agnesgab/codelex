<?php
 $persons = [

     [
         "name" => "Anna",
         "surname" => "Doe",
         "age" => 50,
         "birthday" => "June"
     ],
     [
         "name" => "Peter",
         "surname" => "Moe",
         "age" => 40,
         "birthday" => "July"
     ],
     [
         "name" => "Elsa",
         "surname" => "Roe",
         "age" => 30,
         "birthday" => "August"
     ]

 ];

 foreach ($persons as $person){
     echo $person['name'] . ' ' . $person['surname'] . ' ' . $person['age'] . ' ' . $person['birthday'] . PHP_EOL;
 }