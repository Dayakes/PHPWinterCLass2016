<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            /*
             * Some functions to learn.  Learn more about them on PHP.net
             * 
             * strtoupper
             * var_dump
             * isset
             */
            $str = 'hello'; 
        ?>
        <?php
            echo strtoupper($str);
        ?>
        <?php 
            $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
        ?>
        <?php
            echo $randColor;  
        ?>
        <?php
            var_dump($randColor);
        ?>
        <?php if ( isset($randColor) ) : ?>  
                <span style="background-color:<?php echo $randColor; ?>"><?php echo $randColor; ?> </span>
        <?php endif; ?>
        
    </body>
</html>
