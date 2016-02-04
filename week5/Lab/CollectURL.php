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
        
        $url = filter_input(INPUT_POST, 'URL');
        $isValid = true;
        
        if (isPostRequest()) {
                if ( filter_var($url, FILTER_VALIDATE_URL) === false  ) {
                    $isValid = false;
                    echo "Invalid URL";
                    
                }
                
                if ($isValid) {
                    include './curl.php';
                    include './regex_match.php';
                    
                    
                    
                    
                    
                    
                    
                    $url = '';
                }
            }
               
        ?>
        <form action="#" method="post">
        <Label>Please enter a URL:</label>
        <input type="text" name="URL" value="<?php echo $url; ?>"></text>
        <input type="submit" value="Submit">
        
    </body>
</html>
