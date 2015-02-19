// when BUTTON is clicked
// find all <input> elements of type text.
// check that they are not null
// if they are null set input element's innerhtml til rød bakgrunn eler noe sånt
// if they are non-null, set background to green.


// Make array containing the ID's of <input type="text"> in the HTML object
var validator = {
    dummyVar: "dummytext",
    testVar: "testtext",

    getInputElements: function() {
        // Getting NodeList with HTMLInputObjects
        var nodeListInputs = document.body.getElementsByTagName("input"); // get all <input> elements

        // Putting only the <input type="text"> elements in an array.
        var inputsArray = [];
        for(var i = 0; i < nodeListInputs.length; i++) {
            if(nodeListInputs[i].type === "text") {
                inputsArray[i] = nodeListInputs[i];
            }
        }

        return inputsArray;
    },

    getSubmitButton: function() {
        var nodeListSubmit = document.body.getElementsByTagName("input");

        // Try to find the submit button

    }

};

var inputs = validator.getInputElements();

alert(inputs[0]);



