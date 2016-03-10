<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="text-align: center;">
        <h2>Welcome to Online Address Book!</h2>
        <p>Please enter your login information</p>

        <?php
        require_once './Templates/session-start.req-inc.php';
        $submitButtonValue = 'Login';
        require_once './Templates/loginform.html.php';
        ?> 
        <p>Not a member? Sign up <a href="Templates/Signup.html.php">here</a></p>
        <?php
        require './Functions/utils-function.php';
        require './Functions/dbconnect.php';
        require './Functions/login-function.php';

        if (isPostRequest()) {
            $email = filter_input(INPUT_POST, 'email');
            $pass = filter_input(INPUT_POST, 'pass');

            $_SESSION['isValidUser'] = isValidUser($email, $pass);
        }
        ?>

        <?php
        if (isset($_SESSION['isValidUser']) && $_SESSION['isValidUser'] === true) {
            header('Location: ./Site/index.php');
        }
        ?>

    </body>
</html>
