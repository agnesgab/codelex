<?php
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

foreach ($items as $key => $value) {

    $name = array_column($value, 'name');
    $surname = array_column($value, 'surname');
    $age = array_column($value, 'age');

    echo "$name[0] & $name[1] $surname[0]'s";


}