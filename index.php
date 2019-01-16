
<?php
/*
 *
 *
 */


if(!empty($_POST)){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    //folder names
    $fileName = $name . "-" . date("Y\-m\-d\-G\-i\-s");
    $uploads_folder = "uploads";

    //create folder if doesnt exist
    mkdir ($uploads_folder . DIRECTORY_SEPARATOR . $fileName, 0755);

    if(!empty($_FILES["browsePhoto"]["name"])) {

        //upload file
        $target_dir = $uploads_folder . DIRECTORY_SEPARATOR . $fileName;
        $target_file = $target_dir . basename($_FILES["browsePhoto"]["name"]);

        //get file type
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //upload file
        if(move_uploaded_file($_FILES['browsePhoto']['tmp_name'],
            $target_dir.DIRECTORY_SEPARATOR . $fileName . "." . $fileType))
        echo "Upload success";


    }else{
        echo "file not found";
    }

    //write file into directory
    $file = fopen($uploads_folder . DIRECTORY_SEPARATOR . $fileName . DIRECTORY_SEPARATOR
        . $fileName . ".txt", "w");
    $msg = $name . ", " . $email . ", " . $message;
    fwrite($file, $msg);
    fclose($file);


}else{
    echo "no value entered";
}

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="basicCss.css">
    <script src="basicJs.js"></script>
</head>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="mainForm" enctype="multipart/form-data" onsubmit="return validateForm(this)">
    <div class = "fields">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <span class="error" id="errorName">Please enter a valid name</span>
            <br>

        </div>
        <p>
            <label for="email">Email</label>
            <input tpye="text" id="email" name="email">
            <span class="error" id="errorEmail">Please enter a valid email</span>
        </p>
        <p>
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
            <span class="error" id="errorMessage">Please enter a valid message</span>
        </p>
        <br>
        <span>
            <label for="browsePhoto">Photo</label>
            <input type="file" id="browsePhoto" name="browsePhoto">
            <span class="error" id="errorImage">Please select an image</span>
        </span>
    </div>
    <br>
    <input type="submit" value="Submit" id="submit">
</form>

</html>
