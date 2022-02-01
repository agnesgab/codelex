ex<?php

class Weapon {
    public string $name;
    public int $power;

    public function __construct(string $name, int $power){

        $this->name = $name;
        $this->power = $power;
    }

    public function showWeapon(): string{
        return $this->name;

    }
}

$knife = new Weapon('Knife', 2);
$bazooka = new Weapon('Bazooka', 100);
$glock = new Weapon('Glock', 30);

echo $knife->showWeapon() .PHP_EOL;
echo $bazooka->showWeapon(). PHP_EOL;
echo $glock->showWeapon(). PHP_EOL;

class Inventory {

    public array $inventory;

    public function __construct(array $inventory){
        $this->inventory = $inventory;
    }

    public function add(Weapon $weapon): Weapon{
        return $this->inventory[] = $weapon;
    }

    public function showInventory($inventory){
        foreach ($inventory as $item){
            echo '-----'. PHP_EOL;
            echo "My weapon inventory: " . PHP_EOL;
            foreach ($item as $i){
                echo "Name: $i->name" . PHP_EOL;
                echo "Power: $i->power" . PHP_EOL;

            }
        }
    }
}

$bag = new Inventory([]);
$bag->add($bazooka);
$bag->add($knife);

$case = new Inventory([]);
$case->add($knife);
$case->add($glock);
$case->add($bazooka);
echo PHP_EOL;

$bag->showInventory($bag);
$case->showInventory($case);


