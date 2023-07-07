<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prueba 1 de MVC</title>
    <meta charset="utf-8">
    <!--PLUGGIN DE CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--PLIGGIN JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--VERSION FONTAWESOME-->
    <script src="https://kit.fontawesome.com/55a89c90f7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <h3 class="text-center py-3">PAGINA MUESTRA</h3>
    </div>
    <div class="container-fluid bg-light">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">

                <!--Activación de botones-->
                <?php if (isset($_GET["modulo"])) : ?>
                    <?php if ($_GET["modulo"] == "registro") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?modulo=registro">REGISTRO</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?modulo=registro">REGISTRO</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "ingreso") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?modulo=ingreso">INGRESO</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?modulo=ingreso">INGRESO</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "inicio") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?modulo=inicio">INICIO</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?modulo=inicio">INICIO</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "salida") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?modulo=salida">SALIR</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?modulo=salida">SALIR</a>
                        </li>

                    <?php endif ?>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?modulo=registro">REGISTRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?modulo=ingreso">INGRESO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?modulo=inicio">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?modulo=salida">SALIR</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container py-5">

            <!--inicio de codigo php, redirige al archivo correspondiente segun la selección-->
            <?php
            if (isset($_GET["modulo"])) {
                if (
                    $_GET["modulo"] == "registro" ||
                    $_GET["modulo"] == "ingreso" ||
                    $_GET["modulo"] == "inicio" ||
                    $_GET["modulo"] == "editar" ||
                    $_GET["modulo"] == "salida"
                ) {
                    include "Paginas/" . $_GET["modulo"] . ".php";
                }else{
                    include "paginas/error404.php";
                }
            } else {
                include "Paginas/registro.php";
            }
            ?>
        </div>
    </div>
</body>

</html>