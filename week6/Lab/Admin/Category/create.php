<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            $db = dbconnect();
            
            $result = '';
            //if it is a post request then set the variable accordingly
            if (isPostRequest()) {
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                
                //the sql statement
                $stmt = $db->prepare("INSERT INTO corps set corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
                //binds for the sql statement
                $binds = array(
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                //confirmation that the record was added successfully
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record Added';
                }
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        

        
        <!--form for inputing data for create -->
        <form method="post" action="#">
            Corporation<br><input type="text" name="corp" />
            <br />
            <br>
            Email<br><input type="text" name="email" />
            <br /> 
            <br>
            Zip code<br><input type="text" name="zipcode" />
            <br />
            <br>
            Owner<br><input type="text" name="owner" />
            <br />
            <br>
            Phone<br><input type="text" name="phone" />
            <br />
            <br>
            <input type="submit" value="Create" />
        </form>
        
        <p><a href="view.php">View page</a></p>
        
    </body>
</html>
