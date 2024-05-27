<?php
    function myFunction(){
        echo "This text comes from  a function";
    }
//    create array
//    $myArr = ["Volvo", 25, ["apple","banana"], "myFunction"
//    ];
//    $myArr[3]();
    $myArr = ["Volvo", 25, ["apple","banana"], myFunction()
    ];
    $myArr[3];

    echo "<hr>";

//    indexed array
//    $ary = ["Volvo", "Banana","BMW" , "Toyota"];
//    $ary[2] = "Porsche";
//
//    $ary[5] = "Land Rover";
//    $ary[7] = "Vigo";
//    $ary[14] = "Subaru";
//    array_push($ary,"Ferrari");
//
//    var_dump($ary);
//    echo "<br>";
//    array_push($ary,"BMW");
//    var_dump($ary);
//    echo "<br>";

    $cars = ["brand"=>"Ford","model"=>"Honda","year"=>1964];

//    $cars[] = ["Orange"];
//    $cars["color"] = "Red";
//    $cars["year"]=2024;

      $cars['description']="Japan Model";

//    if(!isset($cars['description'])){
//        $cars['description']="Japan Model"; // key and value
//        array_push($i); // only value
//    }

    var_dump($cars);
    echo "<hr>";

    foreach ($cars as $key => $car) {
        echo $key . " : " . $car . "<br>";
    }

    echo "<hr>";

//    numeric array

    $fruits = array("Apple","Banana","Orange");
    array_push($fruits,"Kiwi","Lemon");
    var_dump($fruits);

    echo "<hr>";

//    $cars = ["brand"=>"Ford","model"=>"Honda","year"=>1964];
    $frus = array("Apple"=>"One","Banana"=>"Two","Orange"=>"Three","Mango"=>5);
//    $cars += ["Apple"=>1,"Banana"=>4,"Orange"=>5];

//    var_dump($cars);

    echo "<hr>";
    var_dump(array_merge($frus,$cars));
    echo "<hr>";

    unset($frus["Apple"]);  // can only delete one item
    var_dump($frus);
    echo "<hr>";

    var_dump($frus);
    echo "<hr>";

    array_splice($frus,1,1); // delete array items
    var_dump($frus);

    echo "<hr>";
//     array different
    echo "Different Array";
    echo "<hr>";

    $newAry = array_diff($frus,["Two",5]);
    var_dump($newAry);
?>