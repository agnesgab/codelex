<?php

function getData($filename){
    $persons = [];
    $open = fopen($filename, "r");

    $data = fgetcsv($open, 1000, ",");

    while (($data = fgetcsv($open, 1000, ",")) !==FALSE){

        $person = new stdClass();
        $person->name = $data[0];
        $person->age = $data[1];
        $person->color = $data[2];
        $persons[] = $person;

    }


    foreach ($persons as $person){
        echo "My name is $person->name, I am $person->age years old. My favorite color is $person->color" . PHP_EOL;
    }



}

