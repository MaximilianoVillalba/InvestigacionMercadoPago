<?php $Titulo = "Inicio - FiDrive";
require_once('../extensiones/vendor/autoload.php');
include_once("../vista/estructura/cabecera.php") ?>
<div class="card p-2 shadow-lg" id=cuerpo>
    <!-- Comienzo div cuerpo-->
    <div class="jumbotron jumbotron-fluid p-2 m-auto">
        <!-- Comienzo div consigna -->
        <h1 class="display-4">Trabajo de Investigacion - MercadoPago</h1>
        <hr class="my-2">
        <p class="lead">
            El siguiente es un listado de productos generados, en este caso estaticamente, pero si bien se puede pensar
            generarlos de manera dinamica. La idea del siguiente ejemplo es un listado en el que el cliente puenda
            agregar tales productos a un carrito "imaginario" para luego poder efectuar la compra
        </p>
        <hr class="my-2">

        <h3 class="lead"><b>Especie de carrito</b></h3>
        <div class="row">
            <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                data-preference-id="184962814-56a50615-bb24-4100-b955-e414b8d6aee5">
            </script>

        </div>
    </div>
</div> <!-- Fin div cuerpo -->
<?php include_once("../vista/estructura/pie.php"); ?>