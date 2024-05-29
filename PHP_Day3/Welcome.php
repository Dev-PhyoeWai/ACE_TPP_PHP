<?php
    // define variable and set to empty value
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    function testInput($data) {
        $data = trim($data);
//        $len =strlen($data);
//        echo $len;
//        echo $data;
        $data = stripslashes($data);
//        echo $data;die;
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = testInput($_POST['username']);
        $email =  testInput($_POST['email']);
        $website =  testInput($_POST['website']);
        $comment =  testInput($_POST['comment']);
        $gender =  testInput($_POST['gender']);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["username"])){
            $nameErr = "* Username is required";
        }else{
            $name = testInput($_POST["username"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                $nameErr = "*Only letters and white space allowed";
            }
        }
        if(empty($_POST["email"])){
            $emailErr = "* Email is required";
        }else{
            $email = testInput($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "*Invalid email format";
            }
        }
        if(empty($_POST["gender"])){
            $genderErr = "* Gender is required";
        }else{
            $gender = testInput($_POST["gender"]);
        }
        if(empty($_POST["website"])){
            $websiteErr = "*Website is required";
        }else{
            $website = testInput($_POST["website"]);
            if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",
                $website)){
                $websiteErr = "*Invalid URL";
            }
        }
    }


?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr)){
                echo "<h1 style='color: greenyellow; text-align: center;margin-top: 20px; '>Register Successful</h1>";
            }
        }
        ?>

        <div class="container">

            <h1>Registration Form</h1>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="username" placeholder="Enter your name" value="<?php echo $name; ?>"/>
                        <span style="color: red"> <?php echo $nameErr; ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>"/>
                        <span style="color: red"> <?php echo $emailErr; ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password"/>
                    </div>
                    <div class="input-box">
                        <span class="details">Website</span>
                        <input type="text" name="website" placeholder="Enter your website" value="<?php echo $website; ?>" />
                        <span style="color: red"> <?php echo $websiteErr; ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Comment</span>
                        <textarea name="comment" rows="5" cols="50"><?php echo $comment; ?></textarea>
                    </div>

                    <div class="gender-details">
                        <div class="g-title">
                            <span class="gender-title">Gender</span>
                        </div>

                        <div class="category">
                            <div class="g-category">
                                <span class="gender">Male</span>
                                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="male" checked />
                            </div>
                            <div class="g-category">
                                <span class="gender">Female</span>
                                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked"; ?> value="female"/>
                            </div>
                            <div class="g-category">
                                <span class="gender">Other</span>
                                <input type="radio" name="gender" <?php if(isset($gender) && $gender=="other") echo "checked"; ?> value="other"/>
                            </div>
                            <span style="color: red"> <?php echo $genderErr; ?></span>
                        </div>

                    </div>
                    <input class="btn" type="submit" value="Register"/>
                </div>

            </form>

        </div>

        <!-- Detail info -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr)) {
            echo "<span>Username => " . htmlspecialchars($name) . "<br>" . "</span> ";
            echo "<span>Email => " . htmlspecialchars($email) . "<br>" . "</span> ";
            echo "<span> Website => " . htmlspecialchars($website) . "<br>" . "</span> ";
            echo "<span>Gender => "  . htmlspecialchars($gender) . "</span> " ;
        }
        ?>


    </body>
</html>

