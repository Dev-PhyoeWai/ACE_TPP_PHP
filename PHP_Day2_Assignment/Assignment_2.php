<?php
    function sum($a, $b, $c) {
        $processValue = function($value) {
            if(($value >= 10 && $value <= 20) && ($value != 13 && $value != 17)){
                return 0;
            }
            return $value;
        };

        $a = $processValue($a);
        $b = $processValue($b);
        $c = $processValue($c);

        return $a + $b + $c;
    }
    echo sum(4, 5, 7) . "<br>";
    echo sum(7, 4, 12) . "<br>";
    echo sum(10, 13, 12) . "<br>";
    echo sum(17, 12, 18);

?>



