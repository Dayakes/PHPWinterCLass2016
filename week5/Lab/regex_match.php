<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* http://
         * http://php.net/manual/en/function.preg-match-all.php
         * http://php.net/manual/en/function.array-unique.php
         * 
         */
            $URLRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
            
            
        
            preg_match_all($URLRegex, $output, $URLMatches);
            
            //print_r($URLMatches[0]);
            //echo '<hr />';
            $links = array_unique($URLMatches[0]);
            //print_r($removeDuplicates);
        
        ?>
    </body>
</html>
