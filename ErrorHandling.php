
<?php
    function inverse($x)
    {
        if(!$x){
            throw new Exception('Devision by zero.');
        }
        return 1/$x;
    }
    try{
        echo inverse(5) . "<br>";
        echo inverse(0) . "<br>";
        echo "Yes" . "<br>";
    }catch(Exception $e){
        echo 'Caught exception' , $e->getMessage() , "<br>";
    }

?>