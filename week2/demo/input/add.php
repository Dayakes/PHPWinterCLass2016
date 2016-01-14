<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO test SET dataone = :dataone, datatwo = :datatwo");

            $dataone = filter_input(INPUT_POST, 'dataone');
            $datatwo = filter_input(INPUT_POST, 'datatwo');

            $binds = array(
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
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
