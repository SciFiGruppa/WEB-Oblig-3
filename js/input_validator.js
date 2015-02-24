/**
 * Herp derp!
 */

/* FORM Object */
var form = function(formElement) {
    var id = formElement.id;
    var textInputs = getTextInputs();
    var submitButton = getSubmitButton();

    // Setting button type to deactivate submitting
    submitButton.type = "button";

    // Setting OnClick method
    submitButton.onclick = function() {
        // Validating and updating each text input
        for(var i = 0; i < textInputs.length; i++) {
            var currentElement = textInputs[i];
            updateInputBgColor(currentElement, isInputValid(currentElement));
        }

        // Checking if all inputs are now valid
        if(isAllInputsValid()) {
            // We're done. Set button type back to submit.
            submitButton.type = "submit";
        }
    };

    function isAllInputsValid() {
        for(var i = 0; i < textInputs.length; i++) {
            if(false === isInputValid(textInputs[i])) {
                return false;
            }
        }
        return true;
    }

    function updateInputBgColor(element, isValid) {
        if(isValid) {
            element.style.backgroundColor = "white";
        } else {
            element.style.backgroundColor = "red";
        }
    }

    function isInputValid(element) {
        return !(element.value === "" || element.value === " " || element.value === null);
    }

    function getTextInputs() {
        var allInputs = formElement.getElementsByTagName("input");
        var textInputs = [];
        for(var i = 0; i < allInputs.length; i++) {
            if(allInputs[i].type === "text") {
                textInputs.push(allInputs[i]);
            }
        }
        return textInputs;
    }

    function getSubmitButton() {
        var allInputs = formElement.getElementsByTagName("input");
        var button = null;
        for(var i = 0; i < allInputs.length; i++) {
            if(allInputs[i].type === "submit") {
                button = allInputs[i];
            }
        }
        return button;
    }
};


// -------------------- RUN START --------------------
// Creating form objects
var nodeList = document.body.getElementsByTagName("form");
var forms = [];
for(var i = 0; i < nodeList.length; i++) {
    var currentForm = new form(nodeList[i]);
    forms.push(currentForm);
}
// -------------------- RUN END --------------------