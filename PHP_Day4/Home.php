<?php

?>
<html>
<head>

</head>
<body>
<!--    <h1>hello</h1>-->
    <?php
//        echo readfile("webdictionary.txt");
        $myFile = fopen("webdictionary.txt", "r") or die ("Unable to open file!");

//      echo fgets($myFile);

        while(!feof($myFile)){
//            echo fgets($myFile) . "<br>";
            echo fgetc($myFile) . "<br>";
        };
        fclose($myFile);

    ?>

</body>

</html>
