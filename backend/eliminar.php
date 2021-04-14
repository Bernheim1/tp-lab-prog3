<?php
    require_once("fabrica.php");
    require_once("empleado.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <div>
        <?php

        $legajo = isset($_GET["legajo"]) ? $_GET["legajo"] : 0;
        $path = "../archivos/empleados.txt";
        $ar = fopen($path, "r");

        while(!feof($ar)){
            
            $cadena = fgets($ar);

            $cadena = is_string($cadena) ? trim($cadena) : false;
            
            

            if($cadena != false){

                $arr = explode(" - ", $cadena);

                    if($arr[4] == $legajo){

                        $auxEmpleado = new Empleado($arr[2], $arr[0], $arr[1], $arr[3], $arr[4], $arr[5], $arr[6]);
                        $auxFabrica = new Fabrica("", 7);
                        
                        $auxFabrica->TraerDeArchivo($path);
                        
                        if($auxFabrica->EliminarEmpleado($auxEmpleado)){
        
                            $auxFabrica->GuardarArchivo($path);
                            echo "El empleado fue eliminado con exito";
                            echo "<a href='mostrar.php'>Mostrar</a>";
                            break;
                        }else{
                            echo "No se pudo eliminiar el empleado de la lista";
                            echo "<a href='../index.html'>Inicio</a>";
                            break;
                        }
                }
            }
            
        }
        fclose($ar);

        ?>
    </div>
</body>
</html>