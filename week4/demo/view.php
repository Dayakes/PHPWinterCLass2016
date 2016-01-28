<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
            
          /* $results = getAllTestData(); */
           
           $column = 'datatwo';
           $search = 'test';
          $results = searchTest($column, $search);
            
        ?>
        
        
        <?php include './TableTemplate.php';?>
    </body>
</html>
