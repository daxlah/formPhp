
/**
 * validateForm(form)
 * Main function called by form.
 *
 * @param form
 * @returns {boolean}
 */
function validateForm(form) {

    let valid = checkName();

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
    let name = document.getElementById("name").value;
    let nameValid = true;
    console.log(name);

    //if(/[A-Z]{1}[a-z']/.test(name[0])){
    if(name.match(/^[a-z']+$/i)) {
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
	let email = document.getElementById("email").value;
	console.log(email);
	let validate = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.com$/

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

	if(document.getElementById("browsePhoto").value) {
        let file = document.getElementById("browsePhoto").value;
        let extension = file.split('.').pop();


        if (extension.match(/(jpg|jpeg|png|gif)$/i)) {
            document.getElementById("errorImage").style.display = "none";
            console.log("Is an image");
            return true;
        } else {
            document.getElementById("errorImage").style.display = "inline";
            console.log("Is an not an image");
            return false;
        }
    }else{
	    return true;
    }


}

/**
 * displayImage()
 * Hides or shows image.
 */
function displayImage(rowId) {
    let id = "diplayImage" + rowId;
    let image = document.getElementById(id);

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
    let id = "displayDirectory" + rowId;
    let image = document.getElementById(id);

    if (image.style.display === "none") {
        image.style.display = "block";
    } else {
        image.style.display = "none";
    }
}
