<?php

class Product
{

    public string $name;
    public float $price;
    public int $amount;

    public function __construct($name, $price, $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }


}

$apples = new Product('Apple', 0.50, 100);
$cheese = new Product('Cheese', 3.50, 20);
$milk = new Product('Milk', 2.15, 50);

class Store
{
    public array $store;

    public function __construct(array $store)
    {
        $this->store = $store;
    }

    public function getProducts(Product $product): Product
    {
        return $this->store[] = $product;
    }

    public function printAll($store)
    {
        $total = 0;
        foreach ($store as $item) {

            foreach ($item as $i) {
                echo "$i->name Price: $i->price Amount: $i->amount" . PHP_EOL;
                $total = $i->price * $i->amount;
            }
            echo "~~~~~~~~~~" . PHP_EOL;
            return "Total: $total$" . PHP_EOL;


        }
    }

}

$groceries = new Store([]);
$groceries->getProducts($apples);
$groceries->getProducts($cheese);
$groceries->getProducts($milk);

echo $groceries->printAll($groceries);