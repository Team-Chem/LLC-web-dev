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
var submitButton4 = document.querySelector(".submitbutton4");
var submitButton5 = document.querySelector(".submitbutton5");
var submitButton6 = document.querySelector(".submitbutton6");
var options = document.querySelector(".form-options");
var btn1 = document.getElementById("btn1");
var form1Sub = document.querySelector("#polymer-data-form");
var btn2 = document.getElementById("btn2");
var form2Sub = document.querySelector("#Mobile-phase-form");
var form1;
var form2;
var form3;
var form4;
var form5;
var form6;
var btn3 = document.getElementById("btn3");
var form3Sub = document.querySelector("#stationary-phase-form");
var btn4 = document.getElementById("btn4");
var form4Sub = document.querySelector("#condition-form");
var btn5 = document.getElementById("btn5");
var form5Sub = document.querySelector("#investigation-form");
var btn6 = document.getElementById("btn6");
var form6Sub = document.querySelector("#upload-form");
var formWrapper = document.getElementById("form-wrapper");
var nameContent = document.querySelector(".request-critHigh");
var feedbackPoly = document.querySelector(".poly-data-preview");
var CritHigh = document.getElementById("critHigh");
var CritLow = document.getElementById("critLow");
var nameContent2 = document.querySelector(".request-critLow");
var PolyName = document.querySelector("#polyName");
var nameContent3 = document.querySelector(".request-polyName");
var Mass = document.querySelector("#mass");
var nameContent4 = document.querySelector(".request-mass");
var Sample = document.querySelector("#samp");
var nameContent5 = document.querySelector(".request-samp");
var nameContent6 = document.querySelector(".request-solv");
var Solvent = document.querySelector("#solv");
var Nonsolvent = document.getElementById("nonSolv");
var nameContent7 = document.querySelector(".request-nonsolv");
var Diameter = document.getElementById("particlediam");
var nameContent8 = document.querySelector(".request-diam");
var PoreSize = document.getElementById("poreSize");
var nameContent9 = document.querySelector(".request-poresize");
var nameContent10 = document.querySelector(".request-ColumnDiam");
var ColumnDim = document.getElementById("columnDim");
var Temp = document.getElementById("temp");
var Pressure = document.getElementById("press");
var FlowRate = document.getElementById("flowRate");
var InjectionVol = document.getElementById("injVolume");
var Detector = document.getElementById("detect");
var nameContent11 = document.querySelector(".request-temp");
var nameContent12 = document.querySelector(".request-pressure");
var nameContent13 = document.querySelector(".request-flow");
var nameContent14 = document.querySelector(".request-inj");
var nameContent15 = document.querySelector(".request-detect");
var nameContent16 = document.querySelector(".request-ref");
var Ref = document.getElementById("reference");
var nameContent17 = document.querySelector(".request-upload");
var Doc = document.getElementById("doc");
var form = document.getElementById("for-submit");
var PolySolv = document.getElementById("polySolv");
var nameContent18 = document.querySelector(".request-poly-solv");
var Submit = document.querySelector(".submitbutton");

function Submit1(){
    //Checking to see if all required form fields are filled. If so, display the submit button.
    if(form.checkValidity() === true){
        Submit.className = "submitbutton show";
    }
}

//These are functions made to reset the previous forms to display none when user clicks on a new form.
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

function DefaultForm4(){
    form4 = document.getElementById("condition-form");
    form4.style.display = "none";
}

function DefaultForm5(){
    form5 = document.getElementById("investigation-form");
    form5.style.display = "none";
}

function DefaultForm6(){
    form6 = document.getElementById("upload-form");
    form6.style.display = "none";
}

//Each of these are meant to display a particular field based on the user clicking.
btn1.addEventListener("click", () => {
    form1 = document.getElementById("polymer-data-form");
    
    if(form1.style.display === "block"){
        form1.style.display = "none";
    }
    else {
        form1.style.display = "block";
        DefaultForm2();
        DefaultForm3();
        DefaultForm4();
        DefaultForm5();
        DefaultForm6();
    }
    form1.addEventListener("change", updatePreview, false);
});

function updatePreview(){
    nameContent.textContent = CritHigh.value;
    nameContent2.textContent = CritLow.value;
    nameContent3.textContent = PolyName.value;
    nameContent4.textContent = Mass.value;
    nameContent5.textContent = Sample.value;
    nameContent18.textContent = PolySolv.value;
    feedbackPoly.className = ".poly-data-preview show2";
}


//Second hidden field.
btn2.addEventListener("click", () =>  {
    form2 = document.getElementById("Mobile-phase-form");
    
    if(form2.style.display === "block"){
        form2.style.display = "none";
    }
    else {
        form2.style.display = "block";
        DefaultForm1();
        DefaultForm3();
        DefaultForm4();
        DefaultForm5();
        DefaultForm6();
    }

    form2.addEventListener("change", updatePreview2, false);
});

function updatePreview2(){
    nameContent6.textContent = Solvent.value;
    nameContent7.textContent = Nonsolvent.value;
    feedbackPoly.className = ".poly-data-preview show2";
}

btn3.addEventListener("click", () => {
    form3 = document.getElementById("stationary-phase-form");
   
    if(form3.style.display === "block"){
        form3.style.display = "none";
        
    }
    else {
        form3.style.display = "block";
        DefaultForm1();
        DefaultForm2();
        DefaultForm4();
        DefaultForm5();
        DefaultForm6();
    }

    form3.addEventListener("change", updatePreview3, false);
});

function updatePreview3(){
    nameContent8.textContent = Diameter.value;
    nameContent9.textContent = PoreSize.value;
    nameContent10.textContent = ColumnDim.value;
    feedbackPoly.className = ".poly-data-preview show2";
}

btn4.addEventListener("click", () => {
    form4 = document.getElementById("condition-form");

    if(form4.style.display === "block"){
        form4.style.display = "none";
    }
    else {
        form4.style.display = "block";
        DefaultForm1();
        DefaultForm2();
        DefaultForm3();
        DefaultForm5();
        DefaultForm6();
    }

    form4.addEventListener("change", updatePreview4, false);
});

function updatePreview4(){
    nameContent11.textContent = Temp.value;
    nameContent12.textContent = Pressure.value;
    nameContent13.textContent = FlowRate.value;
    nameContent14.textContent = InjectionVol.value;
    nameContent15.textContent = Detector.value;

    feedbackPoly.className = ".poly-data-preview show2";
}

btn5.addEventListener("click", () => {
    form5 = document.getElementById("investigation-form");

    if(form5.style.display === "block"){
        form5.style.display = "none";
    }
    else {
        form5.style.display = "block";
        DefaultForm1();
        DefaultForm2();
        DefaultForm3();
        DefaultForm4();
        DefaultForm6();
    }

    form5.addEventListener("change", updatePreview5, false);
});

function updatePreview5(){
    nameContent16.textContent = Ref.value;
    feedbackPoly.className = ".poly-data-preview show2";
}

btn6.addEventListener("click", () => {
    form6 = document.getElementById("upload-form");

    if(form6.style.display === "block"){
        form6.style.display = "none";
    }
    else {
        form6.style.display = "block";
        DefaultForm1();
        DefaultForm2();
        DefaultForm3();
        DefaultForm4();
        DefaultForm5();
    }

    form6.addEventListener("change", updatePreview6, false);
});

function updatePreview6(){

    nameContent17.textContent = Doc.value;
    feedbackPoly.className = ".poly-data-preview show2";
}

//These are to enable the submit button option after valid inputs.
form1Sub.addEventListener("change", Submit1, false);
