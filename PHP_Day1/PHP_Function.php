<?php
    function func1($x,$y){
        $sum = $x + $y;
        if(($sum>=10 && $sum <= 20)){
            return 30;
        }else{
            return $sum;
        }
    }
    echo func1(12,17) . "<br>";
    echo func1(2,17) . "<br>";
    echo func1(22,17) . "<br>";
    echo func1(20,0) . "<br>";
    echo func1(21,17);
?>