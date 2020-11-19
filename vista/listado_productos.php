<?php
include_once("../vista/estructura/cabecera.php") ?>
<div class="card p-2 shadow-lg" id=cuerpo>
    <!-- Comienzo div cuerpo-->
    <div class="jumbotron jumbotron-fluid p-2 m-auto">
        <!-- Comienzo div consigna -->
        <h1 class="display-4">Trabajo de Investigacion - MercadoPago</h1>
        <hr class="my-2">
        <p class="lead">
            <strong> Como principal requisito es instalar <a href="https://getcomposer.org/">COMPOSER</a> en nuestra
                maquina para poder descargar la libreria. </strong>
            <br>
            El siguiente es un listado de productos generados, en este caso estaticamente, pero si bien se puede pensar
            generarlos de manera dinamica. La idea del siguiente ejemplo es que el cliente pueda
            agregar tales productos a un carrito para luego poder efectuar la compra
        </p>
        <hr class="my-2">

        <h3 class="lead"><b>Listado de productos:</b></h3>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="./img/jean.jpg" style="height:22em;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Jean</h4>
                        <h6>$1500</h6>
                        <a class="btn btn-primary" onclick="agregarProducto('producto1', 1500)">Agregar</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="./img/remera negra.jpg" style="height:22em;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Remera negra</h4>
                        <h6>$700</h6>
                        <a class="btn btn-primary" onclick="agregarProducto('producto2', 700)">Agregar</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="./img/poncho.jpg" style="height:22em;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Poncho</h4>
                        <h6>$250</h6>
                        <a class="btn btn-primary" onclick="agregarProducto('producto3', 250)">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <button type="button" class="btn btn-primary" id="btn-carrito">
                Cargar Carrito<span class="badge badge-light ml-2" id="cantidad">0</span>
            </button>
            <div id="pagar">

            </div>
        </div>
    </div>
</div> <!-- Fin div cuerpo -->
<?php include_once("../vista/estructura/pie.php"); ?>