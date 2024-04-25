<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de vehículos</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">
    <form action="datos.php" method="POST">
        <p class="text-xl">Registro de vehiculos</p>
        
        <input type="number" name="bandera" id="" value="1" hidden>

        <label for="marca">Marca</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="marca" id="" required>
        
        <label for="modelo">Modelo</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="modelo" id="" required>
        
        <label for="color">Color</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="color" id="" required>
        
        <label for="anio">Año</label>
        <input class="input input-bordered input-primary w-full input-sm" type="text" name="año" id="año" required>
        
        <label for="cpbateria">Capacidad Bateria</label>
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="bateria" id="" required>
        
        <label for="velocidad">Velocidad</label>
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="velocidad" id="" required>
        
        <label for="capacidadPersonas">Capacidad Personas</label>
        <input class="input input-bordered input-primary w-full input-sm" type="number" name="capacidad" id="" required>
        <br>
        <input class="btn btn-success btn-sm btn-block" type="submit" value="enviar">
    </form>
</body>
</html>

<script>
    
    document.getElementById('año').addEventListener('change', (e) => {
        if (e <= 2019) {
            alert('El año ingresado es menor al solicitado')
        }
    })
</script>
