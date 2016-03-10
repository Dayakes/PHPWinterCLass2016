<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="../stylesheet.css">
    </head>
    <body>
        <?php
        if (isPostRequest()) {
            $isClear = filter_input(INPUT_POST, 'isclear');
            $orderby = filter_input(INPUT_POST, 'orderby');
            $searchby = filter_input(INPUT_POST, 'searchby');
            $searchterm = filter_input(INPUT_POST, 'searchterm');
            if (!isset($orderby)) {
                $orderby = 'fullname';
            }
            if (isset($isClear)) {
                unset($orderby);
                unset($searchby);
                unset($searchterm);
            }
        }
        ?>
        <div style="text-align: center;">

            <form method="post" action="#">
                <div class="search-form">
                    <h2>Please select what you want to search and enter your search term (search terms are case sensitive)</h2>
                    <b>Search</b><br>
                    <input type="radio" name="searchby" value="fullname"<?php
                    if (isset($searchby) && $searchby == 'fullname') {
                        echo 'checked';
                    }
                    ?>/>Name
                    <input type="radio" name="searchby" value="email"<?php
                    if (isset($searchby) && $searchby == 'email') {
                        echo 'checked';
                    }
                    ?>/>Email
                    <input type="radio" name="searchby" value="address"<?php
                    if (isset($searchby) && $searchby == 'address') {
                        echo 'checked';
                    }
                    ?>/>Address
                    <input type="radio" name="searchby" value="phone"<?php
                    if (isset($searchby) && $searchby == 'phone') {
                        echo 'checked';
                    }
                    ?>/>Phone<br>
                    <input type="text" name="searchterm" value="<?php
                    if (isset($searchterm)) {
                        echo $searchterm;
                    }
                    ?>"/><br>
                </div>



                <div class="sort-form">
                    <h2>Please select what you want to sort your search by<br>
                    If none selected will search by Name</h2>
                    <b>Sort by</b><br>
                    <input type="radio" name="orderby" value="fullname"<?php
                    if (isset($orderby) && $orderby == 'fullname') {
                        echo 'checked';
                    }
                    ?>/>Name
                    <input type="radio" name="orderby" value="email"<?php
                    if (isset($orderby) && $orderby == 'email') {
                        echo 'checked';
                    }
                    ?>/>Email
                    <input type="radio" name="orderby" value="address"<?php
                    if (isset($orderby) && $orderby == 'address') {
                        echo 'checked';
                    }
                    ?>/>Address
                    <input type="radio" name="orderby" value="phone"<?php
                    if (isset($orderby) && $orderby == 'phone') {
                        echo 'checked';
                    }
                    ?>/>Phone<br>
                </div>
                <input type="submit" value="Submit Both Forms"/>
                <input type="submit" name="isclear" value="Clear"/>
            </form>
        </div>
    </body>
</html>
