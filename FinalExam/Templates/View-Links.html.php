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
        <link rel="stylesheet" href="../stylesheet.css">
    </head>
    <body>
        <div class="view-link-background">
            <h3 class="view-link-header">Navigation</h3>
            <div class="view-link" ><a href="?view=view">View</a> all addresses</div>
            <div class="view-link"><a href="?view=add">Add</a> an address</div>
            <div class="view-link"><a href="?view=search">Search</a> for an address</div>
            <div class="view-link">
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
