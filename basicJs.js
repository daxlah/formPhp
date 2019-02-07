/**
 * validateForm(form)
 * Main function called by form.
 *
 * @param form
 * @returns {boolean}
 */
function validateForm(form) {

	var valid = checkName();

	if(!checkEmail())
	    valid = false;


	if(!checkFile())
	    valid = false;

	return valid;
}

/**
 * checkName()
 * Checks if the name is valid.
 *
 * @returns {boolean}
 */
function checkName(){
    var name = document.getElementById("name").value;
    var nameValid = true;
    console.log(name);

    //if(/[A-Z]{1}[a-z']/.test(name[0])){
    if(name.match(/[A-Z]{1}[a-z']$/i)) {
        document.getElementById("errorName").style.display = "none";
        console.log("valid name");
    }else{
        document.getElementById("errorName").style.display = "inline";
        console.log("invalid name");
        nameValid = false;
    }

    return nameValid;

}


/**
 * checkEmail()
 * Checks if the email is valid.
 *
 * @returns {boolean}
 */
function checkEmail(){
	var email = document.getElementById("email").value;
	console.log(email);
	var validate = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.com$/

	if(validate.test(String(email))){
		document.getElementById("errorEmail").style.display = "none";
		console.log("valid email");
		return true;
	}else{
		document.getElementById("errorEmail").style.display = "inline";
        console.log("invalid email");
		return false;
	}
}

/**
 * checkFile()
 * Checks if the file is an image.
 *
 * @returns {boolean}
 */
function checkFile(){
	var file = document.getElementById("browsePhoto").value;

    var extension = file.split('.').pop();


	if(extension.match(/(jpg|jpeg|png|gif)$/i)) {
        document.getElementById("errorImage").style.display = "none";
        console.log("Is an image");
        return true;
    }else{
        document.getElementById("errorImage").style.display = "inline";
        console.log("Is an not an image");
        return false;
    }


}

/**
 * displayImage()
 * Hides or shows image.
 */
function displayImage(rowId) {
    var id = "diplayImage" + rowId;
    var image = document.getElementById(id);

    console.log(id);

    if (image.style.display === "none") {
        image.style.display = "block";
    } else {
        image.style.display = "none";
    }
}

/**
 * displayDirectory()
 * Hides or show directory of an image.
 */
function displayDirectory(rowId) {
    var id = "displayDirectory" + rowId;
    var image = document.getElementById(id);

    if (image.style.display === "none") {
        image.style.display = "block";
    } else {
        image.style.display = "none";
    }
}
