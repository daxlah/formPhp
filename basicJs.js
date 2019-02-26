/**
 * apiGet(url)
 * Grabs json and returns all objects in an array
 *
 * @param url
 */
function apiGet(url) {
    let user;
    let userData = new Array();

    let id, firstName, lastName, avatar;


    //let json = $.getJSON(url, function(data) {
    $.getJSON(url, function(data) {


        //check returned item
        console.log("'data' is " + getType(data));

        console.log("Within apiGet function: ", data);

        let size = Object.keys(data).length;

        for(let i = 0; i < size; i++){
            // loads a single object into user
            user = data[Object.keys(data)[i]];

            //load data into users array
            id = user.id;
            firstName = user.first_name;
            lastName = user.last_name;
            avatar = user.avatar;

            userData[i] = [id, lastName, firstName, avatar];
        }

        //print items in userData
        for(let i = 0; i < size; i++){
            console.log(userData[i]);
        }



    });
    return userData;


}

/**
 * getType(p)
 *
 * Displays type of variable
 *
 * @param p
 * @returns {string}
 */
function getType(p) {
    if (Array.isArray(p)) return 'array';
    else if (typeof p == 'string') return 'string';
    else if (p != null && typeof p == 'object') return 'object';
    else return 'other';
}

/**
 * create table of all user (for API)
 * // turn this thing into a function and have url as the parameter
 // get first page. Get "total_pages"
 // change url and count pages accordingly to get all users
 */
function tableCreate(rowNum, colNum, userData){
    // todo: have the userData be a 2d array
    let body = document.body,
        tbl  = document.createElement('table');
    tbl.style.width  = '100px';
    tbl.style.border = '1px solid black';

    for(let i = 0; i < rowNum; i++){
        let tr = tbl.insertRow();
        for(let j = 0; j < colNum; j++){
            if(i === rowNum-1 && j === colNum-1){
                break;
            } else {
                var td = tr.insertCell();
                td.appendChild(document.createTextNode('Cell'));
                td.style.border = '1px solid black';
                if(i === 1 && j === 1){
                    td.setAttribute('rowSpan', '2');
                }
            }
        }
    }
    body.appendChild(tbl);

    tableCreate();
}
//tableCreate();

/**
 * jsonTest()
 * Changes values in html with values in JSON
 *
 */
function jsonTest() {
    let myObj = {name: "Becky", age: 32, city: "Stonecaves"};
    let myJSON = JSON.stringify(myObj);

    myObj = JSON.parse(myJSON);

    document.getElementById("jsonOne").innerHTML = myObj.name;
    document.getElementById("jsonTwo").innerHTML = myObj.age;
    document.getElementById("jsonThree").innerHTML = myObj.city;


}


/**
 *
 *                          XXXXX_____ JAVACRIPT VALIDATION SECTION BELOW _____XXXXX
 *
 */


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
 * displayDirectory()
 * Hides or show directory of an image.
 */
function displayDirectory(rowId) {
    let id = "displayDirectory" + rowId;
    let image = document.getElementById(id);

    if (image.style.display === "none") {
        image.style.display = "inline-block";
    } else {
        image.style.display = "none";
    }
}

/**
 * displayImage()
 * Hides or shows image.
 */
function displayImage(rowId) {
    let id = "diplayImage" + rowId;
    let image = document.getElementById(id);

    if (image.style.display === "none") {
        image.style.display = "inline-block";
    } else {
        image.style.display = "none";
    }
}

/**
 * displayMenu()
 * Hides or shows the menu for mobile users
 */
function displayMenu() {
    let id = document.getElementById("menuButton");


    // todo: show a vertical block of items
    let nav = document.getElementsByClassName("navItems");
    if(nav.style.display === "none") {
        nav.style.display = "block";
    }else{
        nav.style.display = "none";
    }

}

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