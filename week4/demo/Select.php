<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './functions/until.php';
        $value = "";
        if (isPostRequest()) {
            $value = filter_input(INPUT_POST, 'datatwo');
        }
        ?>

        <form action="#" method="post">
            <label>Data 2</label>  
            <select name="datatwo">
                <option value="eggs">Eggs</option>
                <option value="bread" <?php if($value == "bread"):?>selected="selected"<?php endif?> >Bread</option>
            </select>
            <input type="submit" value="Submit" />  
        </form>
    </body>
</html>

