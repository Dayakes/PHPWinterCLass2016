<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>        
        <hr />
        <?php
            $URLRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
            $newPhone = preg_replace( $phoneRegex, $url);
            echo $newPhone;
            
            ?>
            
    </body>
</html>
