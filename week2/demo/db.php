<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $config = array(
            'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassWinter2016', 
            'DB_USER' => 'php', 
            'DB_PASSWORD' => 'winter16'
            );
        
         
            try {
                
                $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
            } catch (Exception $e) {
                echo $e->getMessage();
                exit();
            }

        
        $stmt = $db->prepare("SELECT * FROM test");
        
        //$phoneID = filter_input(INPUT_POST, 'phoneid');
        
        //$binds = array( ":phonetypeid" => $phoneID );
        
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             //var_dump($results);            
             print_r($results);            
         }
         
         //echo  $results[0]['datatwo'];
         
        $value = $results[0];
         foreach ($results as $key => $value) {
               echo $value['dataone'];
         } 
    

        ?>
        
        <ul> 
            <?php foreach ($results as $key => $value): ?>
            <li>
                <?php echo $value['dataone']; ?>
            </li>
            <?php endforeach;?>
        </ul>
    </body>
</html>
