<?php
    $myFile = fopen("test.txt", "a") or die ("Unable to open file!");

//    $txt = "Apple\n";
//    fwrite($myFile, $txt);
//    $txt = "Banana\n";
//    fwrite($myFile, $txt);

    fwrite($myFile, "Landcruiser \nVigo \nPorsche");
    fclose($myFile);
?>