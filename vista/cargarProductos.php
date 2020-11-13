<?php
session_start();
require_once('../extensiones/vendor/autoload.php');

$_SESSION['carritoPrueba'] = $_POST['carritoPrueba'];
$arregloCarrito = $_POST['carritoPrueba'];

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-1391217048471730-072221-9705c9036bbe180579b4c34a61116d59-186471987');
$preference = new MercadoPago\Preference();
/* $preference->back_urls = array(
    "success" => "https://google.com",
    "failure" => "https://localhost/PruebaMercadoPago/prueba.php",
    "pending" => "https://localhost/PruebaMercadoPago/prueba.php"
);
$preference->auto_return = "approved"; */

$items = array();
for ($i = 0; $i < count($arregloCarrito); $i++) {

    //echo $arregloCarrito[$i]['id'] . ' - ' . $arregloCarrito[$i]['cantidad'] . ' - ' . $arregloCarrito[$i]['precio'] . '</br>';

    $item = new MercadoPago\Item();
    $item->title = $arregloCarrito[$i]['id'];
    $item->quantity = $arregloCarrito[$i]['cantidad'];
    $item->unit_price = $arregloCarrito[$i]['precio'];
    array_push($items, $item);
}
$preference->items = $items;
$preference->save();

echo 1;