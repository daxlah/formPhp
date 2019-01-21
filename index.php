<?php
/*
 * todo: testing/fixing
 *
 */


if(!empty($_POST)){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    $checks = array(1, 1, 1, 1);
    $fields = array("Name", "Email", "Message", "Image");


    //checkName
    if(!preg_match("/[A-Z]{1}[a-z']$/i", $name))
        $checks[0] = 0;

    //email
    if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.com$/", $email))
        $checks[1] = 0;

    //message
    if($message == "")
        $checks[2] = 0;




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

        //validate image
        if(!preg_match("/(jpg|jpeg|png|gif)$/i", $fileType))
            $checks[3] = 0;
    }else{
        echo "<br> photo not found";
        $checks[3] = 0;
    }

    /**
     * Checking Errors  ---------------------------------------------------
     */

    $validForm = true;
    for($i = 0; i < count($checks); $i++){
        if($checks[$i] == 0) {
            $validForm = false;

        }
    }

    if($validForm) {
        //upload file
        if(move_uploaded_file($_FILES['browsePhoto']['tmp_name'],
            $target_dir.DIRECTORY_SEPARATOR . $fileName . "." . $fileType))
            echo "<br> Upload success";
    }

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
    echo "no value entered";
}

?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="basicCss.css">
    <!-- JAVASCRIPT VALIDATION SECTION
    <script src="basicJs.js"></script>
    -->
    <?php
        $validForm = true;
        for($i = 0; i < count($checks); $i++){
            if($checks[$i] == 0) {
                $validForm = false;

                echo "  <style type=\"text/css\">
                    #error" . $fields[$i] .
                    " {
                        display: inline;
                    }
                    </style>";

            }else{
                echo "  <style type=\"text/css\">
                    #error" . $fields[$i] .
                     "{
                        display: none;
                    }
                    </style>";
            }
        }
    ?>
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
            <input tpye="text" id="email" name="email" required>
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


