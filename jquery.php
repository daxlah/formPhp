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

            //every time a form is submitted
            $("form").on('submit',function(e){
                e.preventDefault();

                let valid = true;

                //validation


                if(valid)
                    $(this).submit();
            });

            // //prepare the form when the DOM is ready
            // $(document).ready(function() {
            //     // bind form using ajaxForm
            //     $('#mainForm').ajaxForm( { beforeSubmit: validate } );

                //get values from form
                // let valid = true;
                //
                // let name = $('#name').val();
                // let email = $("#email").val();
                // let message = $("#message").val();
                // //let file = $("#browsePhoto")[0].files[0];
                // let file = $("#browsePhoto").files.name;


                // $(document).on('click', 'form button[type=submit]', function(e) {
                //
                //
                //     if(!isValid) {
                //         e.preventDefault(); //prevent the default action
                //     }
                // }



                // //when "submit" is used
                // $("#submit").click(function () {
                //     console.log("Submit button :D");
                //
                //     //name validation
                //     let regex = new RegExp("^[a-z']+$/i");
                //     if (!regex.test(name)) {
                //         valid = false;
                //     }
                //
                //     //email validation
                //     regex = new RegExp("^([a-zA-Z0-9_\\-\\.]+)@([a-zA-Z0-9_\\-\\.]+)\\.com$");
                //     if (!regex.test(email)) {
                //         valid = false;
                //     }
                //
                //     //message validation
                //     if (message == "") {
                //         valid = false;
                //     }
                //
                //     //file validation
                //
                //
                //     //stops submitting
                //     if (!valid) {
                //         $("mainForm").submit(function (e) {
                //             e.preventDefault();
                //         });
                //     }
                //
                // });

                // $(document).ready(function() {
                //     $("#mainForm").validate({
                //        rules: {
                //             name: {
                //                  required: true
                //              }
                //        },
                //         submitHandler: function(form) {
                //            alert('valid form submitted'); // for demo
                //            return false; // for demo
                //         }
                //     });
                // });
            // });
            //
            // function validate(formData, jqForm, options) {
            //     let valid = true;
            //
            //     return valid;
            // }

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



