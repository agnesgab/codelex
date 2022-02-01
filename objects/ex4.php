<?php

function printAll($dataBase)
{
    echo PHP_EOL;
    foreach ($dataBase->getPerson() as $person) {

        echo "Name: {$person->getName()}" . PHP_EOL;
        echo "Surname: {$person->getSurname()}" . PHP_EOL;
        echo "ID: {$person->getId()}" . PHP_EOL;
        echo '~~~~~~~' . PHP_EOL;
    }
}

function enterData(): Person
{
    echo 'Register new person' . PHP_EOL;
    $name = readline('Enter name: ');
    $surname = readline('Enter surname: ');
    $id = (int)readline('Enter ID: ');

    return new Person($name, $surname, $id);
}


class Person
{
    private string $name;
    private string $surname;
    private int $id;


    public function __construct(string $name, string $surname, int $id)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getId(): int
    {
        return $this->id;
    }


}

class Register
{
    private array $persons;

    public function __construct(array $persons)
    {
        $this->persons = $persons;
    }

    public function add(Person $person): Person
    {
        return $this->persons[] = $person;
    }

    public function getPerson(): array
    {
        return $this->persons;
    }


}

$dataBase = new Register([]);


while (true) {
    echo '[1] Add person' . PHP_EOL;
    echo '[2] Print' . PHP_EOL;
    echo '[3] Exit' . PHP_EOL;
    $input = readline('Your option: ');


    switch ($input) {
        case 1:
            $dataBase->add(enterData());
            break;
        case 2:
            printAll($dataBase);
            break;
        case 3:
            echo 'Bye' . PHP_EOL;
            exit;

    }
}

