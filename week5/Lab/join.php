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
        include_once './Functions/dbconnect.php';

        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM sites JOIN sitelinks ON sites.site_id = sitelinks.site_id");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
        <h2>Results found <?php echo count($results); ?></h2>
        <table border="1" class="table table-striped">
            <th>SiteID</th>
            <th>Site</th>
            <th>Link</th>
            <tbody>
                <?php foreach ($results as $index => $row): ?>
                    <tr>
                        <td><?php echo $row['site_id']; ?></td> 
                        <td><?php echo $row['site']; ?></td> 
                        <td><?php echo $row['link']; ?></td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="CollectURL.php">Add new site</a>
        