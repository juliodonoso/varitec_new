<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title><?php echo e($titulo); ?></title>
</head>
<body>
    <p>Se ha generado una orden de <?php echo e($subTitulo); ?></p>
    <p>Datos de la Gestion:</p>
    <ul>
        <li>Cliente: <?php echo e($nombre); ?></li>
        <li>Rut: <?php echo e($rut); ?>}</li>
        <li>Orden Laboratorio: <?php echo e($numero); ?></li>
    </ul>
    <p>Ingrese al Sistema y acepte la orden</p> 
</body>
</html>