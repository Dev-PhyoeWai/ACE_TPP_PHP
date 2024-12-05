<?php

    $firstAry = [10, 20, -30, -40, 30 ];
    $secondAry = [10, 20, 30, 40, 30];
    $middle = count($firstAry)/2;   // 5 / 2 = 2.5
    $middleIndex = floor($middle); // 2
    $newAry = [$firstAry[$middleIndex] , $secondAry[$middleIndex]];
    var_dump($newAry);

?>