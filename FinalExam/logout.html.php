<?php
    
if ( isset($_SESSION['isValidUser']) &&
        $_SESSION['isValidUser'] === true ) {
   echo '<a href="?logout=1">Logout</a>';
}
    $logout = filter_input(INPUT_GET, 'logout');
   
    if ( $logout == 1 ) {
       $_SESSION['isValidUser'] = false;
       $_SESSION['admin'] = false;
    }


?>
   