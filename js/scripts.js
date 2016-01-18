/*global document*/
"use strict";
(function() {
    var elementos = document.getElementsByClassName("borrar");
    for (var i = 0; i < elementos.length; i++) {
        var elemento = elementos[i];
        elemento.addEventListener("click", function(event) {
            if (!confirm("¿Borrar?")) {
                event.preventDefault();
            }
        }, false);
    }
}());

window.onload=manejador;
function manejador(){
var fecha = new Date();
document.getElementById("fechainput").value = new Date().toJSON().slice(0,10);
document.getElementById("forget").addEventListener("click",visivilityOn);
}

function visivilityOn(){
    document.getElementById("forgetform").setAttribute('style', "visibility:visible;");
}