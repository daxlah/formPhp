<?php

if($_POST){
    echo $_POST;
}




require_once ("nav.php");
?>

<!DOCTYPE html>

    <html>
    <head>

        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
        <script src="basicJs.js"></script>

        <link rel="stylesheet" type="text/css" href="basicCss.css">
        <title>Add User</title>

        <script>


        </script>
    </head>
    <body>
    <?php
        if($_GET){
            echo $_GET['id'] . "<br>";
            echo $_GET['fName'] . "<br>";
            echo $_GET['lName'] . "<br>";
            echo $_GET['avatar'] . "<br>";
        }
    ?>
    </body>
</html>