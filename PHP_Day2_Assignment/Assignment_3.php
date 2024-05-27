<?php
    function newString($input) {
        if (strlen($input) < 2) {
            return str_repeat($input, 3);
        } else {
            $firstTwoChars = substr($input, 0, 2);
            return str_repeat($firstTwoChars, 3);
        }
    }
    $input1 = "abc";
    $input2 = "Python";
    $input3 = "J";

    echo newString($input1) . "<br>";
    echo newString($input2) .  "<br>";
    echo newString($input3);
?>

