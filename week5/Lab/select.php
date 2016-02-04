<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to Link Finder!</h1>
       
        <?php
            require './functions/dbconnect.php';
            require './functions/until.php';
            
            
                $db = dbconnect();

                $stmt = $db->prepare("SELECT * FROM sites ORDER BY site DESC");
                $sites = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $site_id = '';
                if ( isPostRequest() ) {
                    
                    
                    $stmt = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                    $site_id = filter_input(INPUT_POST, 'site_id');
                    $binds = array(
                    ":site_id" => $site_id
                    );

                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $error = 'No Results found';
                    }
                    
                    
                    
                }
                
        ?>
        
        <?php if( isset($error) ): ?>        
            <h1><?php echo $error;?></h1>
        <?php endif; ?>
            
        <form method="post" action="#">
 
            Please select a site within the database:<select name="site_id">
            <?php foreach ($sites as $row): ?>
                <option 
                    value="<?php echo $row['site_id']; ?>"
                    <?php if( intval($site_id) === $row['site_id']) : ?>
                        selected="selected"
                    <?php endif; ?>
                >
                    <?php echo $row['site']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Submit" />
        </form>
        
        
        
        
        <?php if( isset($results) ): ?>
 
            <h2>Results found <?php echo count($results); ?></h2>
            <table border="1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['link']; ?></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
        <a href="CollectURL.php">Add new site</a>
            

        
        
        
    </body>
</html>
