/*
18966318
Jenny Zhang
Tuesday 12pm
*/

function validateForm(form) {
	var valid = true;
	var i = 0;
	var functionArrayNames = [checkEmail(), checkName()];

/*
if(!checkEmail())
  valid = false;

if(!checkName())
 valid = false;
*/

	/*
    checkMessage
    checkPhoto(?)
  */


	for(var i = 0; i < functionArrayNames.length(); i++){
		if(!functionArrayNames)
			valid = false;

		i++;
	}




	return valid;
}

function checkEmail(){
	var email = document.getElementById("email").value;
	var validate = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.com$/

	if(validate.test(String(email))){
		document.getElementById("errorEmail").style.display = "none";
		return true;
	}else{
		document.getElementById("errorEmail").style.display = "inline";
		return false;
	}
}


function checkName(){
	var name = document.getElementById("name").value;
	var nameValid = true;

	if(/[A-Z]/.test(name[0])){
		document.getElementById("errorFirstName").style.display = "none";
	}else{
		document.getElementById("errorFirstName").style.display = "inline";
		nameValid = false;
	}

	return nameValid;

}
