
<?php

    #     star patterns 1

    for($row = 0; $row < 4; $row ++){
        for($col = 0; $col <= $row; $col ++){
            echo "*";
        }
        echo "<br>";
    }
    for($row = 0; $row < 5; $row ++){
        for($col = 5; $col > $row; $col--){
            echo "*";
        }
        echo "<br>";
    }

    echo "<hr>";

    #    star pattern 2
    $n = 5;
    for($row = 1; $row < $n; $row ++){
        for($col=1; $col <= $n; $col++){
            if($col>=$n-($row-1) && $col<=$n+($row-1)){
                echo "*";
            }else {
                echo "&nbsp;";
            }
        }
        echo "<br>";
    }
    for ($row = 0; $row < $n; $row++) {
        for ($col = 0; $col < $n ; $col++) {
            if ($col >= $row && $col < 2 * $n - 1 - $row) {
                echo "*";
            } else {
                echo "&nbsp;";
            }
        }
        echo "<br>";
    }

//    for ($row = $n; $row >= 1; $row--) {
//        for ($space = 0; $space < $n - $row; $space++) {
//            echo "&nbsp;";
//        }
//        for ($col = 0; $col <= ($row - 1); $col++) {
//            echo "*";
//        }
//        echo "<br>";
//    }

?>