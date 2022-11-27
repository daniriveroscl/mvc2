<!DOCTYPE html>
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
        <h1>Eliminar un contacto de empresa de la agenda.</h1>

            <!-- Formulario que opera sobre la misma página mediante el método get.-->
        <form action="#" method="get">
        <fieldset>
            <legend>Empresa a eliminar</legend>
            <label for="rSocial">Razón Social:</label>
            <input type="text" id="rSocial" name="rSocial" required><br><br>            
            <input type="submit" value="Enviar" name="envio">
        </fieldset>
    </form>
    
    <?php
        // Verifica si se ha pulsado el botón de envío.
        // Llama al método show() del controlador EnterpriseController con el dato introducido.
        // Muestra los resultados en la página.
        // Se pregunta al usuario si desea eliminar esa empresa mediante un enlace.
        // Cuandos se pulsa dicho enlace, se aplica el método de la función eliminar de empresa.
        if(isset($_GET["envio"])){
            EnterpriseController::show($_GET["rSocial"]);
            echo "<br><br><a href='/enterprise/eliminar?rSocial=" . $_GET["rSocial"] . "'>¿Desea eliminar empresa de la agenda?</a>";           
        }   
    ?>
            <!-- Pie de página -->
            <footer class="footer fixed-bottom bg-dark text-white">
                <div class="text-center">
                    Aplicación de agenda empresarial. 2022 &copy; -- Daniel Riveros --
                </div>
            </footer>
</body>
</html>