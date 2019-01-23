<?php
/*
 * todo: testing/fixing
 *
 */

$validForm = true;




//check name
if(!empty($_POST['name']) || preg_match("/[A-Z]{1}[a-z']$/i", $_POST['name'])){
    $name = $_POST["name"];
}else{
    echo "Invalid name<br>";
    $validForm = false;
}

//check email
if(!empty($_POST['email']) || preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.com$/", $_POST["email"])){
    $email = $_POST["email"];
}else{
    echo "Invalid email<br>";
    $validForm = false;
}

//check message
if(!empty($_POST['message'])){
    $message = $_POST["message"];
}else{
    echo "No value entered in message<br>";
    $validForm = false;
}


//check photo
if(!empty($_FILES) && file_exists($_FILES['browsePhoto']['tmp_name']) && $validForm == true) {
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
            echo "Upload success<br>";
        }else{
            echo "Something went wrong when uploading the file<br>";
            $validForm = false;
        }

    }else{
        echo "File uploaded is not an image<br>";
        $validForm = false;
    }

}else{
    echo "File not found<br>";
    $validForm = false;
}

if($validForm){
    /**
     * write file into directory ---------------------------------------------------
     */
    $file = fopen($uploads_folder . DIRECTORY_SEPARATOR . $fileName . DIRECTORY_SEPARATOR
        . $fileName . ".txt", "w");
    $msg = $name . ", " . $email . ", " . $message;
    fwrite($file, $msg);
    fclose($file);


    /**
     *  Write into userFile.csv
     */
    $cvsData = $name . "," . $email . "," . $message  . "," . $target_dir.DIRECTORY_SEPARATOR . $fileName . "." . $fileType . "\n";
    $fp = fopen("userFile.csv","a");
    fwrite($fp, $cvsData);
    fclose($fp);
}else{
    echo "Please fix the errors listed.";
}


?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="basicCss.css">
    <!-- JAVASCRIPT VALIDATION SECTION -->
    <script src="basicJs.js"></script>
</head>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="mainForm" enctype="multipart/form-data"
      onsubmit="return validateForm(this)">
    <div class = "fields">
        <div>

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <span class="error" id="errorName">Format: Xxxxx</span>
            <br>

        </div>
        <p>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            <span class="error" id="errorEmail">Format: ***@***.com</span>
        </p>
        <p>
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
            <span class="error" id="errorMessage"></span>
        </p>
        <br>
        <span>
            <label for="browsePhoto">Photo</label>
            <input type="file" id="browsePhoto" name="browsePhoto" required>
            <span class="error" id="errorImage">Please select an image</span>
        </span>
    </div>
    <br>
    <input type="submit" value="Submit" id="submit">
</form>

</html>


