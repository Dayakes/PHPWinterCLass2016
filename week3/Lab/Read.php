<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
            <?php
            include './dbconnect.php';
            include './functions.php';
            
            $db = dbconnect();
            
            $id = filter_input(INPUT_GET, 'id');
            
            $stmt = $db->prepare("SELECT * FROM corps where id = :id");
            
            $binds = array(
                ":id" => $id
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            if ( !isset($id) ) {
                die('Record not found');
            }
            $corp = $results['corp'];
            $date = $results['incorp_dt'];
            $email = $results['email'];
            $zipcode = $results['zipcode'];
            $owner = $results['owner'];
            $phone = $results['phone'];
            ?>
        <table class="table table-striped">
            <tr>
                <td>Company Name:</td>
                <td><?php echo $corp;?></td>
            </tr>
            <tr>
                <td>Date Updated</td>
                <td><?php echo  date("F j, Y, g:i a",strtotime($results['incorp_dt'])); ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $email;?></td>
            </tr>
            <tr>
                <td>Zip code:</td>
                <td><?php echo $zipcode;?></td>
            </tr>
            <tr>
                <td>Owner:</td>
                <td><?php echo $owner;?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?php echo $phone;?></td>
            </tr>
        </table>
        <br />
        <p> <a href="view.php">View page</a></p>
                
                
    </body>            
</html>