<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <h1>Detalle de Producto</h1>
    <li>
        <strong>Identificador</strong>
        <?= $product[0] ?>

        <strong>Descripción</strong>
        <?= $product[1] ?>
    </li>

    <h1>Detalle del usuario <?php echo $product->id ?></h1>
    <ul>
        <li><strong>Identificador: </strong><?php echo $product->name ?></li>
        <li><strong>Descripción: </strong><?php echo $product->surname ?></li>
    </ul>
</body>
</html>