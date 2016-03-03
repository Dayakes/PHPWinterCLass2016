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
        <div style="Width:8%; 
             height:150px; 
             border:2px solid black;
             background-color: lightblue;">
            <h3 style="text-align: center;">Navigation</h3>
            <a href="?view=view">View</a> all addresses<br>
            <a href="?view=delete">Delete</a> an address<br>
            <a href="?view=search">Search</a> for an address<br>
            <a href="?view=add">Add</a> an address<br>
            <?php
            include '../logout.html.php';
            if ($_SESSION['isValidUser'] === false) {
                header('Location: ../index.php');
            }
            ?>
        </div>
    </body>
</html>
