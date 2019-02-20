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
        <title>jquery test</title>

        <script type="text/javascript">

            $(document).ready(function(){

                $(document).on("submit", "form", function(e){


                    let valid = true;

                    let name = $("#name").val();
                    let email = $("#email").val();
                    let message = $("#message").val();
                    let imageName = $("#browsePhoto").val();

                    if(!$.fn.validateName(name))
                        valid = false;

                    if(!$.fn.validateEmail(email))
                        valid = false;

                    if(!$.fn.validateMessage(message))
                        valid = false;

                    if(!$.fn.validateFile(imageName))
                        valid = false;

                    if(!valid)
                        e.preventDefault();

                });


                //functions

                /**
                 * validateName()
                 *
                 * @param name
                 * @returns {boolean}
                 */
                $.fn.validateName = function(name){
                    let regex = /^[a-z']+$/i;
                    let valid = true;

                    if (!regex.test(name)) {
                        valid = false;
                        console.log("Invalid name");
                    }

                    return valid;
                };

                /**
                 * validateEmail()
                 *
                 * @param email
                 * @returns {boolean}
                 */
                $.fn.validateEmail = function(email){
                    let regex = /^([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9_\-.]+)\.com$/;
                    let valid = true;

                    if (!regex.test(email)) {
                        valid = false;
                        console.log("Invalid email");
                    }

                    return valid;
                };

                /**
                 * validateMessage()
                 *
                 * @param message
                 * @returns {boolean}
                 */
                $.fn.validateMessage = function(message){
                    let valid = true;

                    if(message === ""){
                        valid = false;
                        console.log("Invalid message");
                    }

                    return valid;
                };

                /**
                 * validateFile()
                 *
                 * @param fileName
                 * @returns {boolean}
                 */
                $.fn.validateFile = function(fileName){
                    let valid = true;
                    let extension = fileName.split(".").pop();

                    if(fileName === ""){
                        console.log("No file found");
                    }else if (!extension.match(/(jpg|jpeg|png|gif)$/i)) {
                        valid = false;
                        console.log("Invalid file type");
                    }

                    return valid;
                }

            });

        </script>
    </head>
    <body>
        <h1>Form</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="mainForm" name="mainForm" enctype="multipart/form-data">
            <div class = "fields">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="default value">
                    <span class="error" id="errorName">Format: Xxxxx</span>
                    <br>

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="default email">
                    <span class="error" id="errorEmail">Format: ***@***.com</span>

                    <label for="message">Message</label>
                    <textarea id="message" name="message">this is demo</textarea>
                    <span class="error" id="errorMessage"></span>

                    <label for="browsePhoto">Photo</label>
                    <input type="file" id="browsePhoto" name="browsePhoto" >
                    <span class="error" id="errorImage">Please select an image</span>

            </div>
            <br>
            <input type="submit" value="Submit" id="submit">
        </form>
    </body>
</html>



