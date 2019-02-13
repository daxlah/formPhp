<?php
require_once("PDOconnect.php");

$id = $_POST['id'];

$sql = "DELETE * FROM table1 WHERE id='$id'";
$result = $conn->query($sql);

$conn = null;

echo "Please wait while the data gets deleted";

header('Location: index.php');
?>