<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="text-align: center;">
        <h2>Welcome to the sign up page!</h2>
        <h3>Please enter a valid email and a password:</h3>
        <?php
        include '../Functions/dbconnect.php';
        include '../Functions/utils-function.php';
        include '../Functions/login-function.php';
        ?>
        <form method="post" action="#">    
            Email : <input name="email" type="text" value="" />
            <br />
            Password : <input name="pass" type="password" value="" />
            <br />
            Retype Password:<input name='validpass' type="text" value="">
            <br />
            <input type="submit" value="Sign Up" />    

        </form>
        <?php
        if (isPostRequest()) {
            $email = filter_input(INPUT_POST, 'email');
            $pass = filter_input(INPUT_POST, 'pass');
            $validpass = filter_input(INPUT_POST, 'validpass');
            if ($pass === $validpass) {
                $isSignedUp = SignUp($email, $pass);
            }
            else{
                
            }



            if ($isSignedUp === true) {
                echo "congratulations, you are now signed up for free address booking!";
                echo '<br>';
                echo "You will be redirected to the login page in 5 seconds!";
                echo '<meta http-equiv="refresh" content="5;url=../index.php" />';
            }
        }
        ?>
    </body>
</html>
