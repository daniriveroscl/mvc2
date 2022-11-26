<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
   <!-- require_once "head.php" PONER EN CADA VISTA QUE HAGA FALTA --> 
</head>
<body>
    <!-- require_once "head.php" -->
    <h1>Inventario de Productos</h1>
        <table>
            <?php
            
            foreach ($products as $item) : ?> <!-- :..endforeach es una mejor forma de cerrar un foreach -->
            <tr>
                <td><b>Identificador:</b><?= $item[0] ?></td>
                <td><b>Descripción:</b><?= $item[1] ?></td>
                <td><a href="product/show?id= <?= $item[0] ?>">Ver Detalle</a></td>
            </tr> 
            <?php endforeach; ?>
        </table> 
    <!-- require_once "head.php" -->
</body>
</html>