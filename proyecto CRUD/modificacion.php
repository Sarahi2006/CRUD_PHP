<?php
include_once('datos.php');

$id = isset($_GET['id']) ? $_GET['id'] : "";

$conexion->conectar();
//desarrollar el select personalizado
$registros = $concensionario->selectupdate($id);
foreach ($registros as $filas){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="datos.php" method="post">
        <input type="text" name="bandera" value="2" hidden="">
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="id" id="" value="<?php echo $filas['id']?>" hidden="">

        <label for="marca">Marca</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="marca" id="" value="<?php echo $filas['marca']?>" required>

        <label for="modelo">Modelo</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="modelo" id="" value="<?php echo $filas['modelo']?>" required>

        <label for="color">Color</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="color" id="" value="<?php echo $filas['color']?>" required>

        <label for="anio" hidden>Año</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="año" id="" value="<?php echo $filas['año']?>" hidden required>

        <label for="cpbateria">Capacidad Bateria</label>
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="bateria" id="" value="<?php echo $filas['bateria']?>" required>

        <label for="velocidad">Velocidad</label>
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="velocidad" id="" value="<?php echo $filas['velocidad']?>" required>

        <label for="capacidadPersonas">Capacidad Personas</label>
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="capacidad" id="" value="<?php echo $filas['capacidad']?>" required>

        <input  class="btn btn-success btn-sm btn-block" type="submit" value="enviar">
    </form>
</body>
</html>


<?php } ?>

<!-- <form action="./datos.php" method="post">

     
</form> -->
