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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        require_once '../Templates/session-start.req-inc.php';

        include '../Templates/View-Links.html.php';

        $viewcheck = filter_input(INPUT_GET, 'view');
        if (!isset($viewcheck)) {
            $view = 'view';
        } else {
            $view = $viewcheck;
        }
        if ($view === 'view') {
            include '../Functions/dbconnect.php';
            include './View-page.html.php';
        }
        if ($view === 'add') {
            include './AddAddress.html.php';
        }
        if ($view === 'edit') {
            
        }
        ?>

    </body>
</html>
