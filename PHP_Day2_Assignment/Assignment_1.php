<?php
    function firstFourElements($array, $element) {
        $limit = min(4, count($array));
        for ($i = 0; $i < $limit; $i++) {
            if ($array[$i] == $element) {
                return true;
            }
        }
        return false;
    }
    $inputs = [
        [[1, 2, 9, 3], 3],
        [[1, 2, 3, 4, 5, 6], 2],
        [[1, 2, 2, 3, 9], 9]
    ];
    foreach ($inputs as $input) {
        $array = $input[0];
        $element = $input[1];
        $result = firstFourElements($array, $element);
        echo var_export($result, true) . "<br>";
    }
?>

