<!doctype html>
<!-- 
    Programación Web Dinámica 2020
    Trabajo práctico entregable
    @author Arian Acevedo
    @link https://github.com/Arian023
-->
<html lang="es">
<head>
    <title><?php echo $Titulo?></title>
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
    <!-- Iconos de Font Awesome (usa fuentes web) -->
    <script src="../vista/js/FontAwesome.js" crossorigin="anonymous"></script>
    <!-- Script para "Buscar en esta página" -->
    <script src="../vista/js/Buscador.js"></script>
    <!-- Estilo para editar texto enriquecido -->
    <link rel="stylesheet" href="../vista/css/summernote-bs4.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">  No me funciona local porque carga fuentes web -->
</head>
<body class="container my-3">
    <?php include_once("../configuracion.php"); 
          include_once("../vista/estructura/menu.php");
    ?>
<!-- Fin cabecera -->