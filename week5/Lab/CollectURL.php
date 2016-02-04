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
        <h1>Welcome to Link Finder!</h1>
        <?php
        include './Functions/until.php';
        
        $url = filter_input(INPUT_POST, 'URL');
        $isValid = true;
        
        if (isPostRequest()) {
                if ( filter_var($url, FILTER_VALIDATE_URL) === false  ) {
                    $isValid = false;
                    echo "<h2>Invalid URL</h2>";
                    
                }
                
                if ($isValid) {
                    include './curl.php';
                    include './regex_match.php';
                    include './Functions/postURLtodb.php';
                    $url = '';
                }
            }
               
        ?>
        <form action="#" method="post">
        <Label>Please enter a URL that is to be searched and added to the database:</label>
        <input type="text" name="URL" value="<?php echo $url; ?>"></text>
        <input type="submit" value="Submit">
        <br>
        <a href="select.php">View existing data</a>
        
    </body>
</html>
