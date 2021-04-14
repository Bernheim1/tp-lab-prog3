<?php
    require_once("empleado.php");
    require_once("fabrica.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML 5 - Formulario Alta Empleado</title>
</head>
<body>
    <div>

    <?php
        $dni = isset($_POST["txtDni"]) ? $_POST["txtDni"] : 0;
        $apellido = isset($_POST["txtApellido"]) ? $_POST["txtApellido"] : 0;
        $nombre = isset($_POST["txtNombre"]) ? $_POST["txtNombre"] : 0;
        $sexo = isset($_POST["comboSexo"]) ? $_POST["comboSexo"] : 0;
        $legajo = isset($_POST["txtLegajo"]) ? $_POST["txtLegajo"] : 0;
        $sueldo = isset($_POST["txtSueldo"]) ? $_POST["txtSueldo"] : 0;
        $turno = isset($_POST["rdoTurno"]) ? $_POST["rdoTurno"] : 0;

        switch($turno){
            case "0":
                $turno = "Mañana";
                break;
            case "1":
                $turno = "Tarde";
                break;
            case "2": 
                $turno = "Noche";
                break;
        }       
        
        $path = "../archivos/empleados.txt";

        $auxEmpleado = new Empleado($apellido, $dni, $nombre, $sexo, $legajo, $sueldo, $turno);
        $auxFabrica = new Fabrica("",7);

        if(!file_exists($path)){
            $ar = fopen($path,"w");
            fclose($path);
        }

        $auxFabrica->TraerDeArchivo($path);

        if($auxFabrica->AgregarEmpleado($auxEmpleado))
        {
            $auxFabrica->GuardarArchivo($path);
            echo "<a href='mostrar.php'>Mostrar</a>";
        }
        else
        {
            echo "Se produjo un error <a href='index.html'>Inicio</a>";
        }
    ?>

    </div>
</body>
</html>