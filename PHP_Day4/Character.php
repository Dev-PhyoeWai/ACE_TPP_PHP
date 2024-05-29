<?php
    echo date('l');
    echo "<br>";
    echo date('D');
    echo "<br>";
    echo date('D/M/Y');
    echo "<br>";
    echo date('D-M-Y');
    echo "<br>";
    echo date('D.M.Y');

?>

<html>
<head></head>
<body>
    <address>
        &copy; 2010-<?php echo date('Y') ?>
    </address>
    <?php
        date_default_timezone_set('Asia/Yangon');
        echo "The time is " . date('h:i:sa');
        echo "<br>";

        $d = strtotime("10:30pm April 15 2014");
        echo "Create date is " .date("Y-m-d h:i:sa", $d);
        echo "<br>";

        $d = strtotime("tomorrow");
        echo date("Y-m-d h:i:sa", $d);
        echo "<br>";

        $d = strtotime("next Saturday");
        echo date("Y-m-d h:i:sa", $d);
        echo "<br>";

        $d = strtotime("+3 Months");
        echo date("Y-m-d h:i:sa", $d);
        echo "<br>";
        echo "<br>";

        $startDate = strtotime("Saturday");
        $endDate = strtotime("+6 weeks", $startDate);

        while ($startDate < $endDate) {
            echo date("M d", $startDate) .  "<br>";
            $startDate = strtotime("+1 week", $startDate);
        }

        $d1 = strtotime("July 04");
        $d2 = ceil(($d1-time()) /60/60/24);

        echo "There are " . $d2 . " days utils 4th of July";
    ?>
</body>
</html>
