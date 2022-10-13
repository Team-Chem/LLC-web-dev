/*
    LCCC
    Filename: forms.js

    Author: Nathaniel Dixon, Mathew Hosier, Hunter Jackson
    Date: 9/19/2022
    References: HTML5 and CSS3 Illustrated, JavaScript Tutorial, W3Schools, GeekforGeeks
*/

//Class variables and assignments

let form = document.getElementById("for-submit");
let submit = document.getElementById(".submitbutton");
let formPreview = document.querySelector(".poly-data-preview");

//These are the Id's from the input fields on the Polymer Data.
let PolymerName = document.getElementById("polyName");
let CritHigh = document.getElementById("critHigh");
let CritLow = document.getElementById("critLow");
let MolarMass = document.getElementById("mass");
let PolymerSolvent = document.getElementById("polySolv");
let UsedSample = document.getElementById("samp");

//These are the Id's from the input fields on the Mobile Phase Data.
let Solvent = document.getElementById("solv");
let NonSolvent = document.getElementById("nonSolv");

//These are the Id's from the input fields on the Stationary Phase Data.
let ParticleDiameter = document.getElementById("particlediam");
let PoreSizes = document.getElementById("poreSize");
let ColumnDimension = document.getElementById("columnDim");

//These are the Id's from the input fields on the Polymer Conditions
let Temperature = document.getElementById("temp");
let Pressure = document.getElementById("press");
let FlowRate = document.getElementById("flowRate");
let InjectionVolume = document.getElementById("injVolume");
let Detector = document.getElementById("detect");

//These are the Id's from the input fields on the Researchers.
let References = document.getElementById("reference");

//These are the Id's from the input fields on the Additional Documentation.
let UploadDocument = document.getElementById("doc");


//Creating the variables for the data previews.
//Row 1
let PreviewPolyName = document.querySelector(".request-polyName");
let PreviewSolvent = document.querySelector(".request-solv");
let PreviewParticleDiameter = document.querySelector(".request-diam");
let PreviewTemperature = document.querySelector(".request-temp");
let PreviewReferences = document.querySelector(".request-ref");
let PreviewDocumentation = document.querySelector(".request-upload");

//document.querySelector(".")
//Row 2
let PreviewCritHigh = document.querySelector(".request-critHigh");
let PreviewNonSolvent = document.querySelector(".request-nonsolv");
let PreviewPoreSize = document.querySelector(".request-poresize");
let PreviewPressure = document.querySelector(".request-pressure");

//Row 3
let PreviewCritLow = document.querySelector(".request-critLow");
let PreviewColumnDimension = document.querySelector(".request-ColumnDiam");
let PreviewFlowRate = document.querySelector(".request-flow");

//Row 4
let PreviewMolarMass = document.querySelector(".request-mass");
let PreviewInjectionVolume = document.querySelector(".request-inj");

//Row 5
let PreviewUsedSample = document.querySelector(".request-samp");
let PreviewDetector = document.querySelector(".request-detect");

//Row 6
let PreviewPolymerSolvent = document.querySelector(".request-poly-solv");

//Making the event listener to trigger the data preview.
form.addEventListener("change", updatePreview, false);

//Creating the update function
function updatePreview(){
    PreviewPolyName.textContent = PolymerName.value;
    PreviewCritHigh.textContent = CritHigh.value;
    PreviewCritLow.textContent = CritLow.value;
    PreviewMolarMass.textContent = MolarMass.value;
    PreviewUsedSample.textContent = UsedSample.value;
    PreviewPolymerSolvent.textContent = PolymerSolvent.value;

    PreviewSolvent.textContent = Solvent.value;
    PreviewNonSolvent.textContent = NonSolvent.value;

    PreviewParticleDiameter.textContent = ParticleDiameter.value;
    PreviewPoreSize.textContent = PoreSizes.value;
    PreviewColumnDimension.textContent = ColumnDimension.value;

    PreviewTemperature.textContent = Temperature.value;
    PreviewPressure.textContent = Pressure.value;
    PreviewFlowRate.textContent = FlowRate.value;
    PreviewInjectionVolume.textContent = InjectionVolume.value;
    PreviewDetector.textContent = Detector.value;

    PreviewReferences.textContent = References.value;

    PreviewDocumentation.textContent = UploadDocument.value;

    formPreview.className = ".poly-data-preview show2";
}