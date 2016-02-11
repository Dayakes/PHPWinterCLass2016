<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    </head>
    <body>

        <?php
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
        ?>
        <a href="../index.php">Back to selection screen</a>
        <p><a href="create.php">Create</a></p>
        <?php
        include_once '../../Functions/dbconnect.php';

        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM products");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "Rows Found: " . $stmt->rowCount();
        }
        ?>
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>Product ID </th>
                    <th>Category ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['product']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['product_id']; ?>">Delete</a></td>
                        <td><a class="btn btn-primary" href="update.php?id=<?php echo $row['product_id']; ?>">Update</a></td>
                        <td><a class="btn btn-warning" href="read.php?id=<?php echo $row['product_id']; ?>">Read</a></td>
                    </tr>
                <?php endforeach; ?>

                </body>
                </html>
