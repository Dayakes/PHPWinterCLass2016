<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">



    </head>
    <body>
        <?php
        include_once './dbconnect.php';
        include './form1.php';
        include './form2.php';
        
        
        $action = filter_input(INPUT_GET, 'action');
        //form 2 variables
        $dropsel2 = filter_input(INPUT_GET, 'groupby');
        $search = filter_input(INPUT_GET, 'search');
        //form 1 variables
        $dropsel = filter_input(INPUT_GET, 'columns');
        $radiosel = filter_input(INPUT_GET, 'sorting');


            //if statements to determine which option was selected
        if ($action == "sort") {//connect and use sort function
            $results = sortcorps($dropsel, $radiosel);
        } else if ($action == "search") {//connect and use search function
            $results = searchcorps($dropsel2, $search);
        } else if (!isset($action)) {//default database connection
            $db = dbconnect();

            $stmt = $db->prepare("SELECT * FROM corps");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo "Rows Found: ".$stmt->rowCount();
            }
        }


        //table to display data
        
        ?>
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Incorp Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['corp']; ?></td>
                        <td><?php echo $row['incorp_dt']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['zipcode']; ?></td>
                        <td><?php echo $row['owner']; ?></td>
                        <td><?php echo $row['phone']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    </body>
</html>
