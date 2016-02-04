<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './functions/until.php';
        if(isPostRequest())
        {
            $field1 = filter_input(INPUT_POST, 'field1');
            $field2 = filter_input(INPUT_POST, 'field2');
            $field3 = filter_input(INPUT_POST, 'field3');
            
        }
        // put your code here
        ?>
        
        <form action="#" method="post">
           Field1: <input name="field1" Value="<?php echo $field1;  ?>" /> <br/>
           Field2: <input name="field2" Value="<?php echo $field2;  ?>"/> <br/>
           Field3: <input name="field3" Value="<?php echo $field3;  ?>"/> <br/>
           <input type="submit" value="submit" />
        </form>
    </body>
</html>
