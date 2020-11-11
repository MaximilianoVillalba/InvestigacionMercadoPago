/* Fuente: https://www.sitepoint.com/community/t/find-in-page-script/3979/4 */

var n = 0;
function buscarEnPagina(TextoBuscado) {
    var cadena, i, encontrado;
    if (TextoBuscado == "") {
        return false; 
    }
    // Busca el siguiente caso del texto a buscar sobre la página, 
    // regresa al comienzo de la página en caso de ser necesario.
    if (window.find) {
        // Verifica si hay una coincidencia en la posición actual. 
        // Si no se encuentra, retrocede a la primera coincidencia.
        if (!window.find(TextoBuscado)) {
            while (window.find(TextoBuscado, false, true)) {
                n++;
            }
        } else {
            n++;
        }
        // Si no se encuentra en ninguna dirección, indica el mensaje:
        if (n == 0) {
            alert("No se encuentra el texto.");
        }
    } else if (window.document.body.createTextRange) {
        cadena = window.document.body.createTextRange();
        // Busca la enésima coincidencia desde el comienzo de la página.
        encontrado = true;
        i = 0;
        while (encontrado === true && i <= n) {
            encontrado = cadena.findText(TextoBuscado);
            if (encontrado) {
                cadena.moveStart("character", 1);
                cadena.moveEnd("textedit");
            }
            i += 1;
        }
        // Si se encuentra, lo resalta y desplaza la página.
        if (encontrado) {
            cadena.moveStart("character", -1);
            cadena.findText(TextoBuscado);
            cadena.select();
            cadena.scrollIntoView();
            n++;
        } else {
            // Caso contrario, comienza nuevamente al comienzo de la página para buscar la primera coincidencia.
            if (n > 0) {
                n = 0;
                buscarEnPagina(TextoBuscado);
            }
            // Si no se encuentra en ninguna parte, muestra el mensaje:
            alert("No se encuentra el texto.");
        }
    }
    return false;
}

function leerEnterB(event) {
	// Protip para pulsar botón 'Buscar' al darle 'Enter':
	var entrada = event.keyCode;
	if (entrada == 13) {
		document.getElementById('Buscar').click();
	}
}
