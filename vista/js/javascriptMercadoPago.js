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
    Swal.fire({
        position: "center",
        icon: "success",
        title: 'Producto cargado',
        showConfirmButton: false,
        timer: 1500,
    })
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
                })
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
});