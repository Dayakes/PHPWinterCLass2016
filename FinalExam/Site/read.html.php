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
        include '../Functions/dbconnect.php';
        include '../Functions/utils-function.php';
        include '../Functions/upload-function.php';

        $id = filter_input(INPUT_GET, 'id');
        $results = getSingleAddress($id);
        ?>
        <h2><a href="./index.php">Back</a></h2>
        <table class="table table-striped">
            <tr>
                <td>
                    Group: <?php
                    if ($results['address_group_id'] === 1) {
                        echo 'Friends';
                    } else if ($results['address_group_id'] === 2) {
                        echo 'Family';
                    } else if ($results['address_group_id'] === 3) {
                        echo 'Coworkers';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Name: <?php echo $results['fullname']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Address: <a href="https://www.google.com/maps/place/<?php echo $results['address']; ?>"><?php echo $results['address']; ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Email: <a href="mailto:<?php echo $results['email']; ?>"><?php echo $results['email']; ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Phone: <a href="tel:<?php echo $results['phone']; ?>"><?php echo $results['phone']; ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Website:<a href="<?php echo $results['website']; ?>"> <?php echo $results['website']; ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    Birthday: <?php echo $results['birthday']; ?> 
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($results['image'] != "") : ?>
                        Image: <img src="./images/<?php echo $results['image']; ?>"  />
                    <?php else : ?>
                        Image: No image found
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <a class="btn btn-primary" href="update.html.php?id=<?php echo $results['address_id']; ?>">Edit</a>
        <a class="btn btn-danger" href="delete.html.php?id=<?php echo $results['address_id']; ?>">Delete</a>
    </body>
</html>
