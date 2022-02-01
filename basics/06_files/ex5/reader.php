<?php


$input = (int) readline('Enter User ID: ');

function getData($input){

    $persons = [];
    $open = fopen('data.csv', "r");

    $data = fgetcsv($open, 1000, ",");

    while (($data = fgetcsv($open, 1000, ",")) !==FALSE){

        $person = new stdClass();
        $person->id = (int) $data[0];
        $person->name = $data[1];
        $person->surname = $data[2];
        $person->age = $data[3];

        $persons[] = $person;

    }

    foreach ($persons as $person) {
        if ($person->id === $input) {
            return "full name: $person->name $person->surname, age: $person->age";
        }
    }

    if($person->id !== $input){
        return 'User does not exist';
    }

}

echo getData($input);
