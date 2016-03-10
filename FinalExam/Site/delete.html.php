<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../Functions/delete-function.php';
        include '../Functions/dbconnect.php';

        $id = filter_input(INPUT_GET, 'id');
        if (deleteRow($id)) {
            echo "Address Deleted, Redirecting you back to the view page in 5 seconds";
            echo '<meta http-equiv="refresh" content="5;url=./index.php" />';
        } else {
            echo "Row not deleted, an error has occured";
        }
        ?>
    </body>
</html>
