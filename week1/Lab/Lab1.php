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
        <table border="1"> 
            <?php //Loop for table rows to create 10 of them
                for($tr = 1 ; $tr <= 10; $tr++): ?> 
                <tr>
                    
                    <?php //loop for table data to create 10 colums for each row
                        for($td = 1; $td <= 10; $td++):?>
                    <td>
                        
                        <?php //Random generator for color code
                            $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF)));?>
                        
                        <?php //if statement to make sure that the randcolor variable has data
                         if ( isset($randColor)) :?>  
                            <span style="background-color:<?php echo $randColor; ?>"><?php echo $randColor; ?> </span>
                        <?php //end the if statement rom above
                            endif; ?> </td>
                    <?php //end the table data for loop
                        endfor; ?>
            <?php //end the table row for loop
                endfor; ?>
                </tr>
        </table>
    </body>
</html>