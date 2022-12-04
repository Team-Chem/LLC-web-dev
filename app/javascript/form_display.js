/*
    LCCC
    Filename: forms.js

    Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
    Date: 9/19/2022
    References: HTML5 and CSS3 Illustrated, JavaScript Tutorial, W3Schools, GeekforGeeks
*/

//Class variables and assignments
//Some of these variables are not used
//The general idea of javascript is to nab an element by getting its id or class name.
//Once you obtain that you can then manipulate certain features on the DOM tree.
let Solvents = document.getElementById("solvents");
let form = document.querySelector(".polymer-entry");
let Composition = document.getElementById("hideComp");
let CompRequired = document.getElementById("comp");

let Submission = document.querySelector(".submitbutton");

form.addEventListener("change", DisplayComposition, false);

//This function is just to display the Composition input field.
function DisplayComposition() {

    if(Solvents.value.includes("/")){
        Composition.style.display = "block";
        CompRequired.setAttribute("required", "");
    }
    else {
        Composition.style.display = "none";
        CompRequired.removeAttribute("required");
    }
}
//These was to impliment a feature where the user would not see the submit button until they entered in all of the appropriate data.
//The teacher did not like it but I will keep it here just in case the client likes it later.
/*
form.addEventListener("change", Submit, false);

function Submit() {
    if(form.checkValidity() === true){
        Submission.className = ".submitbutton show";
    }
}*/
