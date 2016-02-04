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
        include './Functions/until.php';
        include './Functions/dbconnect.php';
        
        
        if(isPostRequest())
            {
        }
        
        
        ?>
        <form action="#" method="post">
        <Label>Please enter a URL:</label>
        <input type="text" name="URL"></text>
        <input type="submit" value="Submit">
        
    </body>
</html>
