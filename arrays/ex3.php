<?php


$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";
$inputValue = readline('');

if($inputValue == in_array($inputValue, $numbers)){
    echo "This array contains $inputValue" . PHP_EOL;
} else {
    echo "This array does not contain $inputValue" . PHP_EOL;
}
