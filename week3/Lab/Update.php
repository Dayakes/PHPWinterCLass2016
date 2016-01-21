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
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $date = filter_input(INPUT_POST, 'incorp_dt');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                
                
                $stmt = $db->prepare("UPDATE corps set corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":incorp_dt" => $date,
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                }
            } else {
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
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        

        
        <?php//form for inputing data for update ?>
        <form method="post" action="#">
            Corps<input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Incorporation date<input type="date" value="<?php echo $date; ?>" name="incorp_dt"/>
            <br />
            Email<input type="text" value="<?php echo $email; ?>" name="email" />
            <br />  
            Zip code<input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            Owner<input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone<input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view.php">View page</a></p>
        
    </body>
</html>
