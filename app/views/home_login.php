<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Lista de usuarios</h1>
        <table>
            <?php

            foreach ($users as $user) : ?> <!-- :..endforeach es una mejor forma de cerrar un foreach -->
            <tr>
                <td><b>ID:</b><?= $user[0] ?></td>
                <td><b>Nombre:</b><?= $user[1] ?></td>
                <td><a href="product/show?id= <?= $user[0] ?>">Ver Detalle</a></td>
            </tr> 
            <?php endforeach; ?>
        </table> 
</body>
</html>