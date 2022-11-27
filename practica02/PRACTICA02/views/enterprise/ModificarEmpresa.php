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
    <h1>Modificar datos de contacto de empresa.</h1>

     <!-- Formulario que se redirecciona a si mismo mediante el método get.-->
    <form action="#" method="get">
        <label for="rSocialModificar">Razón social de la empresa:</label>
        <input type="text" id="rSocialModificar" name="rSocialModificar" required><br><br>
        <input type="submit" value="Comprobar contacto" name="envio">
    </form> 
    
    
    <?php
        // Comprueba que la variable está definida y es distinta de cero o "false".
        // Llama al método show() del controlador EnterpriseController mediante el parámetro introducido.
        // Muestra los resultados en esta página.
        if(isset($_GET["envio"]) && !empty($_GET["envio"])){
            EnterpriseController::show($_GET["rSocialModificar"]);           
        }   
    ?>
    
    <!--Nuevo formulario que modifica los datos de la empresa mediante método post-->
    <!--El formulario tiene un input hidden con el valor pasado en el anterior formulario-->
    <!--Cuando se termine de rellenar los datos, se envían con el botón "enviar".-->
    <!--Se aplica el método "modificar" de EnterpriseController.-->
    <form action="modificar" method="post">
        
        <input type="text" id="rSocialModificar" value="<?= $_GET["rSocialModificar"]?>" name="rSocialModificar" style="margin: 5px" hidden><br><br>
        
        <fieldset">
            <legend>Datos a modificar</legend>
            <label for="rSocial">Razón Social nueva:</label>
            <input type="text" id="rSocial" name="rSocial"><br><br>            
            <label for="direccion">Dirección nueva:</label>
            <input type="text" id="direccion" name="direccion"><br><br>
            <label for="telefono">Teléfono nuevo:</label>
            <input type="number" id="telefono" name="telefono"><br><br>
            <label for="email">Email nuevo:</label>
            <input type="email" id="email" name="email"><br><br>
            <input type="submit" value="Enviar" name="envio">
        </fieldset>
    </form>
    
            <!-- Pie de página -->
            <footer class="footer fixed-bottom bg-dark text-white">
                <div class="text-center">
                    Aplicación de agenda empresarial. 2022 &copy; -- Daniel Riveros --
                </div>
            </footer>
</body>
</html>