<?php
class Person {
    public string $name;
    public string $surname;
    public int $age;

    function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    function  isAdult(){
        if($this->age >= 18){
            return "$this->name is an adult" . PHP_EOL;
        } else {
            return "$this->name is not an adult" . PHP_EOL;
        }
    }
}

$agnese = new Person('Agnese', 'Gabrisa', '28');
$john = new Person('John', 'Doe', '15');
echo $agnese->isAdult();
echo $john->isAdult();
