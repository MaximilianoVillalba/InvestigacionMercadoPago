<?php
session_start();
require_once('../extensiones/vendor/autoload.php');
include_once("../vista/estructura/cabecera.php");

$arregloCarrito = $_SESSION['carritoPrueba'];

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-1391217048471730-072221-9705c9036bbe180579b4c34a61116d59-186471987');
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://google.com",
    "failure" => "https://localhost/PruebaMercadoPago/prueba.php",
    "pending" => "https://localhost/PruebaMercadoPago/prueba.php"
);
$preference->auto_return = "approved";

$items = array();
for ($i = 0; $i < count($arregloCarrito); $i++) {

    $item = new MercadoPago\Item();
    $item->title = $arregloCarrito[$i]['id'];
    $item->quantity = $arregloCarrito[$i]['cantidad'];
    $item->unit_price = $arregloCarrito[$i]['precio'];
    array_push($items, $item);
}
$preference->items = $items;
$preference->save();

?>
<div class="card p-2 shadow-lg" id=cuerpo>
    <div class="jumbotron jumbotron-fluid p-2 m-auto">
        <h1 class="display-4">Trabajo de Investigacion - MercadoPago</h1>
        <hr class="my-2">
        <p class="lead">
            El siguiente es un listado de productos que se agregaron al carrito. Una vez que veamos que estan correctos.
            Le damos al boton de PAGAR
        </p>
        <hr class="my-2">

        <h3 class="lead"><b>Especie de carrito</b></h3>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($j = 0; $j < count($arregloCarrito); $j++) { ?>
                    <tr>
                        <th scope="row"><?php echo $arregloCarrito[$j]['id']; ?></th>
                        <td>$ <?php echo $arregloCarrito[$j]['precio']; ?></td>
                        <td><?php echo $arregloCarrito[$j]['cantidad']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                data-preference-id="<?php echo $preference->id; ?>">
            </script>
        </div>
    </div>
</div>
<?php include_once("../vista/estructura/pie.php"); ?>