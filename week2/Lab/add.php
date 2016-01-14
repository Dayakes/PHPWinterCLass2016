<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="view.php">Click here to view the actors in the database!</a>
        <?php
        include './db-connect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, "
                    . "dob = :dob, height = :height");

            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob= filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Actor's first name <input type="text" value="" name="firstname" />
            <br />
            Actor's last name <input type="text" value="" name="lastname" />
            <br />
            Actor's DOB <input type="date" value="" name="dob" />
            <br />
            Actor's Height <input type="text" value="" name="height" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
