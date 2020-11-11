/* Todo lo siguiente hace funcionar el botón para volver al principio 
Fuente: https://bootsnipp.com/snippets/ZXdy2
*/

// Se activa el botón al desplazarse 100px de la página, se oculta al regresar:
window.onscroll = function() {aparecerBoton()};

function aparecerBoton() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("volverArriba").style.display = "block";
    } else {
        document.getElementById("volverArriba").style.display = "none";
    }
}

// Se activa al cliquear botón para ir al principio de la página:
function irArriba() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}