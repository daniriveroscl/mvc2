<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
</head>

<body>
 <!-- Header que incluye diferentes clases de diseño de plantilla -->
<header>
            <nav
                class="navbar navbar-expand-lg navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
                <a class="navbar-brand" href="#">|AgendiX|</a>
                <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="/home">Inicio</a></li>
                        <li class="nav-item active"><a class="nav-link" href="/home/agenda">Agenda</a></li>
                        <li class="nav-item active"><a class="nav-link" href="/login">Login</a></li>
                        <li class="nav-item active"><a class="nav-link" href="/login/logout">Logout</a></li>   
                    </ul>    
                </div>
            </nav>
</header>
    <!--Menú de la agenda.-->
    <!--Cada enlace manda a un controlador diferente y a su respectivo método -->
    <h1>Bienvenido estimado usuario <?= $_SESSION["credenciales"][0] ?> </h1>
    <h3>Escoja una opción:</h3>

    <button><a href="/user/index">Gestión de personas</a></button>
    <button><a href="/enterprise/index">Gestión de empresas</a></button>
    <button><a href="/datos/importar">Importar datos</a></button>
    
    <!-- Pie de página -->
    <footer class="footer fixed-bottom bg-dark text-white">
        <div class="text-center">
            Aplicación de agenda empresarial. 2022 &copy; -- Daniel Riveros --
        </div>
    </footer>
</body>
</html>