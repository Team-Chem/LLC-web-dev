/*
    LCCC
    Filename: forms.js

    Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
    Date: 9/19/2022
    References: HTML5 and CSS3 Illustrated, JavaScript Tutorial, W3Schools, GeekforGeeks
*/

//Class variables and assignments
let Solvents = document.querySelector("#solvents");
let form = document.querySelector(".polymer-entry");
let Composition = document.querySelector(".possible-composition");
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

form.addEventListener("change", Submit, false);

function Submit() {
    if(form.checkValidity() === true){
        Submission.className = ".submitbutton show";
    }
}

function DisplayPreviews(){

}

/* This section is for the preview page */
const form1 = document.querySelector(".polymer-preview");
const forms = document.querySelector(".polymer-entry");
const Poly1 = document.getElementById("polyName");
const high = document.getElementById("critHigh");
const low = document.getElementById("critLow");
const Solv = document.getElementById("solvents");
const Comp = document.getElementById("comp");
const Part = document.getElementById("partDiam");
const Size = document.getElementById("poreSize");
const Column = document.getElementById("colDim");
const ColName = document.getElementById("colName");
const Temp = document.getElementById("temp");
const Press = document.getElementById("press");
const Flow = document.getElementById("flowRate");
const Inj = document.getElementById("injVol");
const Detect = document.getElementById("det");
const Ref = document.getElementById("ref");
const Doc = document.getElementById("upload");


forms.addEventListener("submit", function(e) {
e.preventDefault();

    const PolyNameValue = Poly1.value;
    const highValue = high.value;
    const lowValue = low.value;
    const SolvValue = Solv.value;
    const CompValue = Comp.value;
    const PartValue = Part.value;
    const SizeValue = Size.value;
    const ColumnValue = Column.value;
    const ColNameValue = ColName.value;
    const TempValue = Temp.value;
    const PressValue = Press.value;
    const FlowValue = Flow.value;
    const InjValue = Inj.value;
    const DetectValue = Detect.value;
    const RefValue = Ref.value;
    const DocValue = Doc.value;

                
    localStorage.setItem("Poly-Name", PolyNameValue);
    localStorage.setItem("Mol-High", highValue);
    localStorage.setItem("Mol-Low", lowValue);
    localStorage.setItem("Solvent", SolvValue);
    localStorage.setItem("Composition", CompValue);
    localStorage.setItem("Particle", PartValue);
    localStorage.setItem("Size", SizeValue);
    localStorage.setItem("Column", ColumnValue);
    localStorage.setItem("ColName", ColNameValue);
    localStorage.setItem("Temp", TempValue);
    localStorage.setItem("Press", PressValue);
    localStorage.setItem("Flow", FlowValue);
    localStorage.setItem("Inj", InjValue);
    localStorage.setItem("Detect", DetectValue);
    localStorage.setItem("Rev", RefValue);
    localStorage.setItem("Doc", DocValue);
});