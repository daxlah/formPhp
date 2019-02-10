<?php

$id = $_POST['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="basicCss.css">
        <script src="basicJs.js"></script>
        <title>Edit Row</title>
    </head>
    <body>
        <h1>Edit <?php echo $id ?></h1>
        <form action="loadEdit.php" method="post" id="editForm" enctype="multipart/form-data"
              onsubmit="return validateForm(this)">
            <div class = "fields">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                    <span class="error" id="errorName">Format: Xxxxx</span>
                </div>
                <br>

                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                    <span class="error" id="errorEmail">Format: ***@***.com</span>
                </div>
                <br>

                <div>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                    <span class="error" id="errorMessage"></span>
                </div>
                <br>

                <div>
                    <label for="browsePhoto">Photo</label>
                    <input type="file" id="browsePhoto" name="browsePhoto" >
                    <span class="error" id="errorImage">Please select an image</span>
                </div>
                <br>

                <div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </div>

            </div>
            <br>
            <input type="submit" value="Submit" id="submit">
        </form>
    </body>
</html>
