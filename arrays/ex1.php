<?php
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

echo "Original numeric array: " . PHP_EOL;
foreach ($numbers as $num){
    echo "$num, ";
}

echo PHP_EOL;

echo "Sorted numeric array: " . PHP_EOL;
sort($numbers);
foreach ($numbers as $num) {
    echo "$num, ";
}

echo PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

echo "Original string array: " . PHP_EOL;
foreach ($words as $word){
    echo "$word, ";
}

echo PHP_EOL;

echo "Sorted string array: " . PHP_EOL;
sort($words);
foreach ($words as $word) {
    echo "$word, ";
}