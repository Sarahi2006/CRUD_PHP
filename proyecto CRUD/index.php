<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial 2</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-xl">REGRISTROS</h1>
    <a href="./registro.php" class="link link-success">Registrar</a>

    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th><br><br>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Año</th>
                <th>Bateria</th>
                <th>Velocidad</th>
                <th>Capacidad Personas</th>
                <th>opciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            include_once('datos.php');
            $conexion->conectar();
            $registros = $concensionario->select();


            foreach  ($registros as $filas){
                echo"<tr>";
                    echo"<td>{$filas['id']}";
                    echo"<td>{$filas['marca']}";
                    echo"<td>{$filas['modelo']}";
                    echo"<td>{$filas['color']}";
                    echo"<td>{$filas['año']}";
                    echo"<td>{$filas['bateria']}";
                    echo"<td>{$filas['velocidad']}";
                    echo"<td>{$filas['capacidad']}";
                    echo"<td><a href='modificacion.php?id={$filas['id']}'  class='link link-accent'>Modificar</a> <a href='datos.php?iddelete={$filas['id']}&banderaE=3' class='link link-error'>Eliminar</a></td>";
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
