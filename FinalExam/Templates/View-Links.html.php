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
        <div style="Width:100%; 
             height:50px; 
             border:2px solid black;
             background-color: lightblue;">
            <h3 style="text-align: center; margin:0px">Navigation</h3>
            <div style='border:1px solid black; width:25%;float:left;text-align: center;'><a href="?view=view">View</a> all addresses</div>
            <div style='border:1px solid black; width:25%;float:left;text-align: center;'><a href="?view=add">Add</a> an address</div>
            <div style='border:1px solid black; width:25%;float:left;text-align: center;'><a href="?view=search">Search</a> for an address</div>
            <div style='border:1px solid black; width:25%;float:left;text-align: center;'>
            <?php
            include '../Templates/logout.html.php';
            if ($_SESSION['isValidUser'] === false) {
                header('Location: ../index.php');
            }
            ?>
            </div>
        </div>
    </body>
</html>
