document.addEventListener("DOMContentLoaded", () => {
    if (!localStorage.getItem("carritoPrueba")) {
        localStorage.setItem("carritoPrueba", "[]");
    }
});

var carritoPrueba = JSON.parse(localStorage.getItem("carritoPrueba"));

function agregarProducto(prod, precioProd) {
    let registro = {
        id: prod,
        cantidad: 1,
        precio: precioProd
    }

    carritoPrueba.push(registro);
    localStorage.setItem("carritoPrueba", JSON.stringify(carritoPrueba));
}

$("#btn-carrito").click(() => {
    let carritoPrueba = JSON.parse(localStorage.getItem("carritoPrueba"));
    $.ajax({
        data: { carritoPrueba },
        url: "cargarProductos.php",
        type: "POST",
        dateType: "json",
        success: function (data) {
            if (data == 1) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: 'Carrito cargado correctamente',
                    showConfirmButton: false,
                    timer: 2500,
                }).then(() => {
                    window.location = 'carrito.php';
                    //$('#pagar').html('<script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>" ></script > ');
                })
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
});