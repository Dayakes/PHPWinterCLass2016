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
        <?php //links to the other pages ?>
        <h2><a href="../index.php">Back to selection screen</a></h2>
        <h2><a href="create.php">Create new category</a></h2>
        
        <?php
        include_once '../../Functions/dbconnect.php';

        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM categories");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<h3>Rows Found: " . $stmt->rowCount()."</h3>";
        }
        ?>
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['category']; ?></td>
                        <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>
                        <td><a class="btn btn-primary" href="update.php?id=<?php echo $row['category_id']; ?>">Update</a></td>
                        <td><a class="btn btn-warning" href="read.php?id=<?php echo $row['category_id']; ?>">Read</a></td>
                    </tr>
                <?php endforeach; ?>

                </body>
                </html>
