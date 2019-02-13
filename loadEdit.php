<?php
require_once("PDOconnect.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST["email"];
$message = $_POST["message"];



//check photo
if(!empty($_FILES) && file_exists($_FILES['browsePhoto']['tmp_name'])) {
    $filename = $_FILES['browsePhoto']['name'];
    //get file type
    $fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //validate image
    if(preg_match("/(jpg|jpeg|png|gif)$/i", $fileType)){
        //folder names
        $fileName = $name . "-" . date("Y\-m\-d\-G\-i\-s");
        $uploads_folder = "uploads";

        //create folder if doesnt exist
        mkdir ($uploads_folder . DIRECTORY_SEPARATOR . $fileName, 0755);

        //upload file
        $target_dir = $uploads_folder . DIRECTORY_SEPARATOR . $fileName;
        $target_file = $target_dir . basename($_FILES["browsePhoto"]["name"]);

        if(move_uploaded_file($_FILES['browsePhoto']['tmp_name'],
            $target_dir.DIRECTORY_SEPARATOR . $fileName . "." . $fileType)) {
            /**
             *  $imageDirectory for database var here
             */
            $imageDirectory = $target_dir . DIRECTORY_SEPARATOR . $fileName . "." . $fileType;

            echo "Please wait while the row is edited";
        }else{
            echo "Something went wrong when uploading the file.<br>";
        }

    }else{
        echo "File uploaded is not an image.<br>";
    }
}else{
    $imageDirectory = "";
}

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

header('Location: table.php');
?>