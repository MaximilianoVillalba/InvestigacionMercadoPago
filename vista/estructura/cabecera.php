<!doctype html>
<!-- 
    Programación Web Dinámica 2020
    Trabajo práctico entregable
    @author Arian Acevedo
    @link https://github.com/Arian023
-->
<html lang="es">
<!-- 
    Programación Web Dinámica 2020
    Trabajo práctico de investigacion
    @author Arian Acevedo
    @author Maximiliano Villalba
    @link https://github.com/Arian023
    @link https://github.com/MaximilianoVillalba
-->

<head>
    <title>MercadoPago</title>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Arian Acevedo">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../vista/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/css/bootstrap/bootstrapValidator.min.css">
    <!-- Mi estilo: -->
    <link rel="stylesheet" href="../vista/css/general.css">
    <link rel="shortcut icon" href="../vista/img/icon.png">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="../vista/js/sweetalert2/sweetalert2.min.css">

    <!-- Iconos de Font Awesome (usa fuentes web) -->
    <script src="../vista/js/FontAwesome.js" crossorigin="anonymous"></script>
    <!-- Estilo para editar texto enriquecido -->
    <link rel="stylesheet" href="../vista/css/summernote-bs4.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">  No me funciona local porque carga fuentes web -->
</head>

<body class="container my-3">
    <?php include_once("../configuracion.php");
    require_once('../vendor/autoload.php');
    include_once("../vista/estructura/menu.php");
    ?>
    <!-- Fin cabecera -->