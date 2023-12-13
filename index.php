<?php

class Calculator {
    public function add($a, $b, $c = 0) {
        return $a + $b + $c;
    }
}

// Usage
$calculator = new Calculator();
$result1 = $calculator->add(2, 3, 4);    // Output: 9
$result1 = $calculator->add(2, 3);       // Output: 5

echo ($result1);
?>

