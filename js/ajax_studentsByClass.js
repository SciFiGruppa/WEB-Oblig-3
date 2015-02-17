var domfn = {
    fillDom: function (array, id, header, selected) {
        "use strict";
        var ul = document.getElementById(id),
        	header = document.getElementById(header);
        if (ul && header) {
        	header.innerHTML = "Studenter for klassen " + selected;
            for (var i = 0; i < array.length; i++) {
                var newElement = document.createElement('li'),
                    elementText = document.createTextNode(array[i]);
                newElement.appendChild(elementText);
                ul.appendChild(newElement);
            }
            return;
        }
    },
    emptyList: function (id, header) {
        "use strict";
        var ul = document.getElementById(id),
        	header = document.getElementById(header);
        if (ul && header) {
            ul.innerHTML = '';
            header.innerHTML = '';
        }
    }
}

var sitefn = {
    getAjax: function () {
        "use strict";
        if (window.XMLHttpRequest) {
            return new XMLHttpRequest();
        } else {
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
    },
    doAjax: function (data, domlist, header, selected) {
        "use strict";
        var xmlhttp = this.getAjax(),
            params = "cc="+data;

        domfn.emptyList(domlist, header);

        xmlhttp.open('POST', 'php/getStudentsByClass.php');
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var response = JSON.parse(xmlhttp.responseText);
                console.log(response);
                domfn.fillDom(response, domlist, header, selected);
            }
        }

        xmlhttp.send(params);
    }
}