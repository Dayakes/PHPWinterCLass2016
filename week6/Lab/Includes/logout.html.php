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
        if ( isset($_SESSION['isValidUser']) &&
        $_SESSION['isValidUser'] === true ) {
   echo '<a href="?logout=1">Logout</a>';
}
    $logout = filter_input(INPUT_GET, 'logout');
   
    if ( $logout == 1 ) {
       $_SESSION['isValidUser'] = false;
    }


        ?>
    </body>
</html>
