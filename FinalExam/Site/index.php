<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        require_once '../Templates/session-start.req-inc.php';

        include '../Templates/View-Links.html.php';

        $viewcheck = filter_input(INPUT_GET, 'view');
        if (!isset($viewcheck)) {
            $view = 'view';
        } else {
            $view = $viewcheck;
        }
        if ($view === 'view') {
            include '../Functions/dbconnect.php';
            include './View-page.html.php';
        }
        if ($view === 'add') {
            include './AddAddress.html.php';
        }
        if ($view === 'search') {
            include '../Functions/dbconnect.php';
            include '../Functions/search-functions.php';
            include '../Functions/utils-function.php';
            include './Search.html.php.php';
            include './View-page.html.php';
        }
        ?>

    </body>
</html>
