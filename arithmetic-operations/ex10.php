<?php
class Geometry {

    public static function Circle($radius): int {
        return pi() * $radius ** 2;
    }
    public static function Rectangle($length, $width): int {
        return $length * $width;
    }
    public static function Triangle($base, $height): int {
        return $base * $height * 0.5;
    }
    public static function Quit(){
        exit('Bye');
    }
}


echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";


function getAllAreas(){

    $choice = readline("Enter your choice (1-4) : ");

    if($choice == 1){
        $radius = (int) readline('Radius: ');
        if(!$radius <= 0) {
            return Geometry::Circle($radius) . PHP_EOL;
        } else {
            return 'Error! Only positive numbers are allowed.';
        }
    } elseif ($choice == 2){
        $length = (int) readline('Length: ');
        $width = (int) readline('Width: ');
        if(!$length && $width <= 0) {
            return Geometry::Rectangle($length, $width) . PHP_EOL;
        } else {
            return 'Error! Only positive numbers are allowed.';
        }
    } elseif ($choice == 3){
        $base = (int) readline('Base: ');
        $height = (int) readline('Height: ');
        if(!$base && $height <= 0) {
            return Geometry::Triangle($base, $height) . PHP_EOL;
        } else {
            return 'Error! Only positive numbers are allowed.';
        }
    } elseif ($choice == 4){
        return Geometry::Quit();
    } else {
        return "Error!";
    }

}

echo getAllAreas();