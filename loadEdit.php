<?php
require_once("PDOconnect.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST["email"];
$message = $_POST["message"];

/**
 * Update database
 */
$statement = $conn->prepare("UPDATE table1 
                                        SET 
                                        name=:name, email=:email, message=:message, imageDirectory=:imageDirectory 
                                        WHERE id=:id 
                                   ");

$statement->bindValue(':name', $name);
$statement->bindValue(':email', $email);
$statement->bindValue(':message', $message);
$statement->bindValue(':imageDirectory', $imageDirectory);
$statement->bindValue(':id', $id);

$statement->execute();

$conn = null;

header("location: index.php")
?>