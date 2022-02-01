<?php

function hasReachedAgeOf18(stdClass $person, int $ageOf): bool{

    return $person->age >= $ageOf;
}

function createPerson(string $name, int $age): stdClass{
    $person = new stdClass();
    $person->name = $name;
    $person->age = $age;
    return $person;
}


$persons = [

    createPerson('Agnese', 28),
    createPerson('John', 17)

];


$age = intval(readline('Enter age: '));


foreach ($persons as $person){
    echo "$person->name";
    if(hasReachedAgeOf18($person, $age)){
        echo " has reached age of " . $age;
    } else {
        echo " has not reached age of " . $age ;
    }

    echo PHP_EOL;
}
