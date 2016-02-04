<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>     
        <?php
        include './Functions/dbconnect.php';
            $db = dbconnect();

            $results = '';

            if(isPostRequest())
                {
                    $stmt = $db->prepare("INSERT INTO sites set site = :url, date = now()");
                    
                    $binds = array(
                        ":url" => $url
                    );

                    if($stmt->execute($binds) && $stmt->rowCount() > 0)
                    {
                        $results = 'Record Added';
                        $site_id = $db->lastInsertId();
                        
                        $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");
                        
                        foreach($links as $link)
                        {
                            $binds = array(":link" => $link, ":site_id" => $site_id);
                            $stmt->execute($binds);
                            
                        }
                    }
                    else
                    {
                        $results = 'Record not Added';
                    }
                }
                echo $results;
        ?>
    </body>
</html>