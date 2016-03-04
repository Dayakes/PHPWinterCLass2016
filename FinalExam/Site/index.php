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
        require_once '../Templates/session-start.req-inc.php';

        include '../Templates/View-Links.html.php';
        $view = filter_input(INPUT_GET, 'view');
        //view search add delete
        if ($view === 'view') {
            
        }
        if ($view === 'add') {
            
        }
        if ($view === 'edit') {
            
        }
        
        ?>

    </body>
</html>
