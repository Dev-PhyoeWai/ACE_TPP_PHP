
<?php

#  php escaping
#  Claire O'Reilly said"Hello"
echo 'Claire O\'Reilly';
echo " said \"Hello\"" . "<br>";

echo "Claire O'Reilly";
echo ' said "Hello"' . "<br>";

#  php variable
$testVariable = 3;
$testVariable = "Three";

$roll = rand(1,6);
//    if($roll === 6){
//        echo "You Win!";
//    }else{
//        echo "You Lose!";
//    }
echo 'You rolled a ' . $roll . "<br>";
echo $roll === 6 ? "You Win!" : "You Lose! <br>";

$d = date('D');
echo $d . "<br>";
echo ($d === "Wed") ? "Have a nice weekend!" : "Have a nice day! <br>";

switch ($d){
    case "Mon" : echo "Today is Monday"; break;
    case "Tue" : echo "Today is Tuesday"; break;
    case "Wed" : echo "Today is Wednesday"; break;
    case "Thu" : echo "Today is Thursday"; break;
    case "Fri" : echo "Today is Friday"; break;
    case "Sat" : echo "Today is Saturday"; break;
    case "Sun" : echo "Today is Sunday"; break;
    default : echo "Wonder which day is this ?";
}

?>