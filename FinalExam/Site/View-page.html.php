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
//INSERT INTO `phpclasswinter2016`.`address` (`address_id`, `user_id`, `address_group_id`, `fullname`, `email`, `address`, `phone`, `website`, `birthday`, `image`) VALUES (NULL, '2', '1', 'asdf fdsadf', 'soup@soup.com', '23 fdhgdiskds', '4015295195', 'https://neit.instructure.com/courses/24081/modules', '0000-00-00 00:00:00.000000', NULL);
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
        $results = getAllAddress();
        if (isset($results)):
            ?>
            <table class="table table-striped">
                <th>Group</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td>
                            <?php
                            if ($row['address_group_id'] === 1) {
                                echo "Friends";
                            } else if ($row['address_group_id'] === 2) {
                                echo "Family";
                            } else if ($row['address_group_id'] === 3) {
                                echo "Coworkers";
                            }
                            ?>
                        </td>
                        <?php if ($row['image'] != "") : ?>
                            <td><img src="./images/<?php echo $row['image']; ?>" /> </td>
                        <?php else : ?>
                            <td>No image found</td>
                        <?php endif; ?>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php endif;
        ?>
    </body>
</html>
