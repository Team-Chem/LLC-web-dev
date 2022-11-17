/*
    LCCC
    Filename: forms.js

    Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
    Date: 9/19/2022
    References: HTML5 and CSS3 Illustrated, JavaScript Tutorial, W3Schools, GeekforGeeks
*/

//Class variables and assignments
let Solvents = document.getElementById("solvents");
let form = document.querySelector(".polymer-entry");
let Composition = document.getElementById("hideComp");
let CompRequired = document.getElementById("comp");

let Submission = document.querySelector(".submitbutton");

form.addEventListener("change", DisplayComposition, false);

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
/*
form.addEventListener("change", Submit, false);

function Submit() {
    if(form.checkValidity() === true){
        Submission.className = ".submitbutton show";
    }
}*/