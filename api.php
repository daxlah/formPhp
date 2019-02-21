<?php


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
        <title>API</title>

        <script>
            let url = 'https://reqres.in/api/users?page=';

            let result = apiGet(url);
            console.log(data);
            let users = [];

            //better loop idea: https://stackoverflow.com/questions/13802987/to-count-the-number-of-objects-in-object-literal-using-jquery
            for(let i = 0; i < result.length; i++){
                users[i] = result[i];
                console.log(users[i]);
            }

            // OR


            //todo: display users in a table :P



        </script>
    </head>
    <body>
<!--    <button onclick="apiTest()">Get Shibe</button>-->
    </body>
</html>