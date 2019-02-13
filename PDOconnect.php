<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $dbname = "test";


    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        // set PDO error mode to ezception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "Failed to connect to database: " . $e->getMessage();
    }

    echo "<br>";

?>