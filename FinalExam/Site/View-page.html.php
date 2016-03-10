<?php
//address_id
//user_id
//address_group_id
//fullname 
//email
//address 
//phone
//website 
//birthday
//image
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        include '../Functions/View-functions.php';
        if (!isset($searchby) || !isset($searchterm)) {
            $results = getAllAddress();
        } else {
            $results = searchAddress($searchby, $searchterm, $orderby);
        }
        if (isset($results)):
            ?>
            <table class="table table-striped">
                <th>Name</th>
            <?php foreach ($results as $row) : ?>
                    <tr>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><a class="btn btn-warning" href="read.html.php?id=<?php echo $row['address_id']; ?>">Show All</a></td>
                        <td><a class="btn btn-primary" href="update.html.php?id=<?php echo $row['address_id']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="delete.html.php?id=<?php echo $row['address_id']; ?>">Delete</a></td>
                    </tr>
    <?php endforeach; ?>
            </table>
            <?php endif;
            ?>
    </body>
</html>
