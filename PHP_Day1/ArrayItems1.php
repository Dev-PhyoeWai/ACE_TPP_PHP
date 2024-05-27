<?php
    $cars = ["Volvo", "BMW", "Toyota"];
//    array_pop($cars); // delete array last index
//    array_shift($cars); // delete array first index
//    var_dump($cars);

    # array sorting
    sort($cars);
    echo "<h3>Ascending</h3>";
    var_dump($cars);
    echo "<hr>";
    $number = [4,6,2,22,11];
    sort($number);
    var_dump($number);

    echo "<hr>";
    echo "<hr>";

    rsort($cars);

    echo "<h3>Descending</h3>";
    var_dump($cars);
    echo "<hr>";
    $number = [4,6,2,22,11];
    rsort($number);
    var_dump($number);

    echo "<hr>";echo "<hr>";
//    Associated array sorting
    $c = ["brand"=>33, "model"=>20, "year"=>42];
    echo "<h3>Descending</h3>";
    asort($c); # value sort
    var_dump($c);
    echo "<hr>";
    ksort($c); # key sort
    var_dump($c);

    echo "<hr>";echo "<hr>";
    echo "<h3>Ascending</h3>";

    arsort($c); # value sort
    var_dump($c);
    echo "<hr>";
    krsort($c); # key sort
    var_dump($c);

?>