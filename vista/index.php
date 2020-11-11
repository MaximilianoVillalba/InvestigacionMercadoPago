<?php $Titulo = "Inicio - FiDrive";
include_once("../vista/estructura/cabecera.php") ?>
<div class="card p-2 shadow-lg" id=cuerpo>
    <!-- Comienzo div cuerpo-->
    <div class="jumbotron jumbotron-fluid p-2 m-auto">
        <!-- Comienzo div consigna -->
        <h1 class="display-4">Trabajo de Investigacion - MercadoPago</h1>
        <hr class="my-2">
        <p class="lead">
            Debido a la situacion que nos compete a todos, se ha solicitado de gran manera lo que llamos "e-commerce" o
            comercio electronico.
            Gracias a esta alternativa dentro del mercado, se le facilita a los comercios la
            posibilidad de poder recibir pagos de manera online y a los clientes, poder comprar via online logrando una
            una facilidad y practicidad en cuanto a la circulacion de la moneda corriente.
        </p>
        <hr class="my-2">

        <h3 class="lead"><b>Listado de productos:</b></h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Boton</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Pantalon Jean</td>
                    <td>$1500</td>
                    <td>
                        <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="184962814-4652549f-a356-4261-8c17-7c1734985e8a">
                        </script>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Remera Negra</td>
                    <td>$700</td>
                    <td>
                        <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="184962814-bdced8be-87a7-41db-8ae9-ce90a11f9f1a">
                        </script>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
        <!-- <ul>
            <li>Listado de archivos con funciones de compartir/modificar/eliminar</li>
            <li>Íconos mostrados según extensión de archivo o carpeta <small>(aún no lee icono seleccionado por
                    usuario)</small></li>
            <li>Crear carpeta y navegar por subcarpetas <small>(no permite cambiar nombre o borrar)</small></li>
            <li>Animación al pasar cursor por cada caja de icono</li>
            <li>Botón de "Volver arriba" al navegar por páginas largas <small>(aparece flotando en la esquina inferior
                    derecha)</small></li>
            <li>Buscador de palabras en el mismo sitio <small>(integrado a la barra de navegación)</small></li>
            <li>Plugins de formularios para generar texto enriquecido y validar fortaleza de contraseña</li>
            <li>Sitio web mayormente responsive y visualmente organizado <small>(excepto detalles para centrar
                    cajas)</small></li>
            <li>Navegación en barra superior y mapa del sitio a continuación <small>(Nuevo archivo carga en carpeta
                    raíz, demás opciones accesibles directamente a modo ilustrativo)</small></li>
        </ul> -->
    </div>
</div> <!-- Fin div cuerpo -->
<?php include_once("../vista/estructura/pie.php"); ?>