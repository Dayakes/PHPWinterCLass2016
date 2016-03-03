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
    <body>
        <?php
        include '../Functions/dbconnect.php';
        include '../Functions/utils-function.php';
        include '../Functions/login-function.php';
        
        $submitButtonValue = 'Sign Up';
        
        include './loginform.html.php';
        
        if(isPostRequest()){
            $email = filter_input(INPUT_POST, 'email');
            $pass = filter_input(INPUT_POST, 'pass');
            
            $isSignedUp = SignUp($email, $pass);
        }
        ?>
    </body>
</html>
