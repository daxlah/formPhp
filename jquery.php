<?php


?>

<!DOCTYPE html>
<html>
    <head>
        <script
                src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="basicCss.css">
        <script src="basicJs.js"></script>
        <title>jquery test</title>
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



