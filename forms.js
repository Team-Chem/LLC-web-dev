/*
    LCCC
    Filename: forms.js

    Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
    Date: 9/19/2022
    References: HTML5 and CSS3 Illustrated, JavaScript Tutorial, W3Schools, GeekforGeeks
*/

//Class variable declaration and assignments by quering css style selectors
var submitButton = document.querySelector(".submitbutton");
var submitButton2 = document.querySelector(".submitbutton2");
var submitButton3 = document.querySelector(".submitbutton3");
var options = document.querySelector(".form-options");
var btn1 = document.getElementById("btn1");
var form1Sub = document.querySelector("#polymer-data-form");
var btn2 = document.getElementById("btn2");
var form2Sub = document.querySelector("#Mobile-phase-form");
var form1;
var form2;
var form3;
var btn3 = document.getElementById("btn3");
var form3Sub = document.querySelector("#stationary-phase-form");
//Did not need this just set base display to none */
/*document.addEventListener("load", () => {
    form = document.getElementById("polymer-data-form");
    form.style.display = none;
}); */

function Submit1(){
    //Checking to see if all required form fields are filled. If so, display the submit button.
    if(form1Sub.checkValidity() === true){
        submitButton.className = "submitbutton show";
    }
}

function Submit2(){

    if(form2Sub.checkValidity() === true){
        submitButton2.className = "submitbutton2 show";
    }
}

function Submit3(){
    if(form3Sub.checkValidity() === true){
        submitButton3.className = "submitbutton3 show";
    }
}

function DefaultForm1(){
    form1 = document.getElementById("polymer-data-form");
    form1.style.display = "none";
}

function DefaultForm2(){
    form2 = document.getElementById("Mobile-phase-form");
    form2.style.display = "none";
}

function DefaultForm3(){
    form3 = document.getElementById("stationary-phase-form");
    form3.style.display = "none";
}

//Each of these are meant to display a particular field based on the user clicking.
btn1.addEventListener("click", () => {
    form1 = document.getElementById("polymer-data-form");
    
    if(form1.style.display === "none"){
        form1.style.display = "block";
        DefaultForm2();
        DefaultForm3();
    }
    else {
        form1.style.display = "none";
    }
});

//Second hidden field.
btn2.addEventListener("click", () =>  {
    form2 = document.getElementById("Mobile-phase-form");
    
    if(form2.style.display === "none"){
        form2.style.display = "block";
        DefaultForm1();
        DefaultForm3();
    }
    else {
        form2.style.display = "none";
    }
});

btn3.addEventListener("click", () => {
    form3 = document.getElementById("stationary-phase-form");
   
    if(form3.style.display === "none"){
        form3.style.display = "block";
        DefaultForm1();
        DefaultForm2();
    }
    else {
        form3.style.display = "none";
    }
});

//These are to enabel the submit button option after valid inputs.
form1Sub.addEventListener("change", Submit1, false);

form2Sub.addEventListener("change", Submit2, false);

form3Sub.addEventListener("change", Submit3, false);
