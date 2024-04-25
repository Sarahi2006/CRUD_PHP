<?php
$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : "";
$banderaE = isset($_GET['banderaE']) ? $_GET['banderaE'] : "";
$id = isset($_POST['id']) ? $_POST['id'] : "";
$idd = isset($_GET['iddelete']) ? $_GET['iddelete'] : "";
$marca = isset($_POST['marca']) ? $_POST['marca'] : "";
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : "";
$color = isset($_POST['color']) ? $_POST['color'] : "";
$año = isset($_POST['año']) ? $_POST['año'] : "";
$bateria = isset($_POST['bateria']) ? $_POST['bateria'] : "";
$velocidad = isset($_POST['velocidad']) ? $_POST['velocidad'] : "";
$capacidadpersonas = isset($_POST['capacidad']) ? $_POST['capacidad'] : "";

include_once('conf/conf.php');

class Concensionario{
    public $conexion;
    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function select(){
        $consulta_select = 'SELECT * FROM vehiculos';
        $ejecutar_consultas = $this->conexion->conexion->query($consulta_select);
        return $ejecutar_consultas->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($datos){
        $campos = implode(',',array_keys($datos));
        $valores = "'".implode("','",array_values($datos))."'";
        $consulta_insertar = " INSERT INTO vehiculos ($campos) VALUES ($valores)";
        $resultado = $this->conexion->conexion->query($consulta_insertar);
        return true;
    }

    public function selectupdate($id){
        $consultaSelect = "SELECT * FROM vehiculos WHERE id=$id";
        $ejecutarConsulta = $this->conexion->conexion->query($consultaSelect);
        return $ejecutarConsulta->fetch_all(MYSQLI_ASSOC);
    }

    public function update($id, $datos){
        $set = [];
        foreach ($datos as $campo => $valor){
            $set[] = "$campo = '$valor'";
        }
        $set = implode(',', $set);
        $consultaActualizar = "UPDATE `vehiculos` SET $set WHERE id = $id";
        $resultado = $this->conexion->conexion->query($consultaActualizar);
        if ($resultado){
            return true;
        }else{
            return $this->conexion->conexion->error;
        }
    }

    public function delete($id){
        $consultaDelete = "DELETE FROM vehiculos WHERE id=$id";
        $ejecutarDelete = $this->conexion->conexion->query($consultaDelete);
        return $ejecutarDelete;
    }
}

$concensionario = new Concensionario($conexion);

if ($bandera == 1){
    $datosInsert = array('marca' => $marca, 'modelo' => $modelo, 'color' => $color, 'año' => $año, 'bateria' => $bateria, 'velocidad' => $velocidad, 'capacidad' => $capacidadpersonas);
    $conexion->conectar();
    // Validación del año
    if ($año <= '2019') {
        echo '<script>
            var resultado = window.confirm("Lo sentimos, no se permiten autos menores o iguales al año 2019.");
            if (resultado === true) {
                // Aquí redirige a la página deseada
                window.location.href = "registro.php";
            } else {
                window.location.href = "index.php";
            }
        </script>'; 
    } else {
        $concensionario->insert($datosInsert);
        if ($concensionario){
            header('location: index.php');
        }
    }
    
}else if($bandera == 2){
    $datosActualizar = array('marca' => $marca, 'modelo' => $modelo, 'color' => $color, 'año' => $año, 'bateria' => $bateria, 'velocidad' => $velocidad, 'capacidad' => $capacidadpersonas);
    $conexion->conectar();
    $concensionario->update($id, $datosActualizar);

    if ($concensionario){
        header('location: index.php');
    }
}else if($banderaE == 3){
    $conexion->conectar();
    $concensionario->delete($idd);

    if($concensionario){
        header('location:index.php');
    }
};