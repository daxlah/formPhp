<?php
    /*
     * todo: testing/fixing
     *
     */

    require_once("PDOconnect.php");

    $validForm = true;

    //check name
    if(!empty($_POST['name']) || preg_match("/[A-Z]{1}[a-z']$/i", $_POST['name'])){
        $name = $_POST["name"];
    }else{
        $validForm = false;
    }

    //check email
    if(!empty($_POST['email']) || preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.com$/", $_POST["email"])){
        $email = $_POST["email"];
    }else{
        $validForm = false;
    }

    //check message
    if(!empty($_POST['message'])){
        $message = $_POST["message"];
    }else{
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
                /**
                 *  $imageDirectory for database var here
                 */
                $imageDirectory = $target_dir . DIRECTORY_SEPARATOR . $fileName . "." . $fileType;


            }else{
                echo "Something went wrong when uploading the file.<br>";
                $validForm = false;
            }

        }else{
            echo "File uploaded is not an image.<br>";
            $validForm = false;
        }

    }else{
        /*
         * PHP VALIDATION
         *
                echo "File not found.<br>";
                $validForm = false;
        */
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
        $cvsData = $name . "," . $email . "," . $message  . "," . $target_dir.DIRECTORY_SEPARATOR . $fileName . "." . $fileType;
        $fp = fopen("userFile.csv","a");
        fwrite($fp, $cvsData . "\n");
        fclose($fp);

        /**
         *  Write into database
         */
        $sql = "INSERT INTO table1 (name, email, message, imageDirectory) VALUES ('$name', '$email', '$message', '$cvsData')";


        $statement = $conn->prepare("INSERT INTO 
                                                table1 
                                                    (name, email, message, imageDirectory) 
                                                VALUES 
                                                    (:name, :email, :message, :imageDirectory)
                                   ");

        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':message', $message);
        $statement->bindValue(':imageDirectory', $imageDirectory);


        if ($statement->execute()){
            echo "Data saved into database.";
        }else{
            echo "query failed";
        }


    }

$conn = null;

    require_once ("nav.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="basicCss.css">
        <script src="basicJs.js"></script>
        <title>Basic web page</title>
    </head>
    <body>
        <h1>Form</h1>
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
                    <input type="file" id="browsePhoto" name="browsePhoto" >
                    <span class="error" id="errorImage">Please select an image</span>
                </span>
            </div>
            <br>
            <input type="submit" value="Submit" id="submit">
        </form>
    </body>
</html>



