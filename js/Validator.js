// ---------- PROCEDURAL START ----------
// Getting the form elements
var forms = document.body.getElementsByTagName("form");

// Creating
forms[0].


// ---------- PROCEDURAL END ----------


/* FORM Object */
var form = function(formID, formInputElements, formSubmitButton) {
    var id = formID;
    var inputElements = formInputElements;
    var submitButton = formSubmitButton
};

/**
 * Function for validating <input type="text"> elements.
 * @param element The input element to be validated.
 * @return returns true if the element is valid, false otherwise.
 */
function isInputValid(element) {
    if(element.value === "" || element.value === " " || element.value === null) {
        return false;
    } else {
        return true;
    }
}

/**
 * Sets the background color of an element
 * @param element
 * @param color
 */
function setElementBgColor(element, color) {
    element.style.backgroundColor = color;
}
