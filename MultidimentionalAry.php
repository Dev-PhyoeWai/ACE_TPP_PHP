<?php
    $marks = [
        "Hla Hla" => [ "Physics" => 40, "Maths" => 32, "Chemistry" => 39 ],
        "Soe Soe" => [ "Physics" => 60, "Maths" => 52, "Chemistry" => 38 ],
        "Aung Aung" => [ "Physics" => 29, "Maths" => 43, "Chemistry" => 31 ],
    ];
    echo "Marks for Hla Hla in Chemistry is : " . $marks["Hla Hla"]["Physics"] . "<br>";
    echo "Marks for Soe Soe in Maths is : " . $marks["Soe Soe"]["Maths"] . "<br>";
    echo "Marks for Aung Aung in Physics is : " . $marks["Aung Aung"]["Physics"] . "<br>";

    echo "<hr>";

    foreach ($marks as $name => $mark) {
    #        echo "Mark for $name is : " . $mark["Physics"] . " in physics <br>";
    #        echo "Mark for $name is : " . $mark["Maths"] . " in maths <br>";
    #        echo "Mark for $name is : " . $mark["Chemistry"] . " in chemistry <br>";

#       echo "<hr>";

        echo "Marks for $name are : <br>";
        foreach ($mark as $sub => $value) {
            echo "In $sub = " . $value . "<br>";
        }
    }
    echo "<hr>";

    for($i = 0; $i <=10; $i ++){
        echo "The number is : $i <br>";
    }

    echo "<hr>";

    # break
    for($i = 0; $i <=10; $i ++){
        if($i == 4) break;
        echo "The number is : $i <br>";
    }

    echo "<hr>";

    # continue
    for($i = 0; $i <=10; $i ++){
        if($i == 4) continue;
        echo "The number is : $i <br>";
    }

    for($i = 0; $i <= 30; $i ++){
        if($i % 6 === 0){
            echo "<br>";
        }else{
            echo "*";
        }
    }

?>