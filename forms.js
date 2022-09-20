//Class variable declaration and assignments by quering css style selectors
var submitButton = document.querySelector(".submitbutton");
var FormSelect = document.querySelector(".form-wrapper");
var options = document.querySelector(".form-options");
var btn1 = document.getElementById("btn1");
var form1Sub = document.querySelector("#polymer-data-form");
var form;

function Submit(){
    //Checking to see if all required form fields are filled. If so, display the submit button.
    if(form.checkValidity() === true){
        submitButton.className = "submitbutton show";
    }
}

btn1.addEventListener("click", () => {
    form = document.getElementById("polymer-data-form");
    if(form.style.display === "none"){
        form.style.display = "block";
    }
    else {
        form.style.display = "none";
    }
});

form1Sub.addEventListener("change", Submit, false);