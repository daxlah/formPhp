<?php
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
            // let body = document.body;
            // let arr = ['id', 'fName', 'lName', 'avatar'];
            //
            // let id = sessionStorage.getItem("id");
            // let fname= sessionStorage.getItem("fName");
            // let lName = sessionStorage.getItem("lName");
            // let avatar = sessionStorage.getItem("avatar");
            //
            // for(let i = 0; i < 4; i++){
            //     let para = document.createElement("p");
            //     let node = document.createTextNode(id);
            //     para.appendChild(node);
            // }
            // body.appendChild(para);




        </script>
    </head>
    <body>
    <?php
        if($_POST){
            echo "POST <br>";
            echo $_POST['id'] . "<br>";
            echo $_POST['fName'] . "<br>";
            echo $_POST['lName'] . "<br>";
            echo $_POST['avatar'] . "<br>";
        }
        if($_GET){
            echo "GET <br>";
            echo $_GET['id'] . "<br>";
            echo $_GET['fName'] . "<br>";
            echo $_GET['lName'] . "<br>";
            echo $_GET['avatar'] . "<br>";
        }
    ?>
    </body>
</html>