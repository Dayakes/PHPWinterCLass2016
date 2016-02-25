<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include '../../Functions/upload-function.php';
        try {
            if (isPostRequest()) {
                $fileName = uploadImage('upfile');
                //echo $fileName;
            }
        } catch (RuntimeException $e) {

            echo $e->getMessage();
        }
        ?>


        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="#" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            <input name="upfile" type="file" />
            <input type="submit" value="Update" />
        </form>

    </body>
</html>