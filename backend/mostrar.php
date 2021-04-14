<?php
    require_once("./fabrica.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML 5 – Listado de Empleados</title>
</head>
<body>
    <h2>Listado de empleados</h2>
    <table style="margin-left:60px">
        <tr>
            <th style="text-align:left;padding-left:15px" colspan="2">
            <h4>Info</h4>
            </th>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:15px" colspan="5">
                <hr>
            </td>
        </tr>

        <?php
            ValidarSesion("./login.html");
            $path = "../archivos/empleados.txt";
            $ar = fopen($path,"r");
            $flag = false;

            if(file_exists($path)){
            
                while(!feof($ar)){
                    $cadena = fgets($ar);

                    $cadena = is_string($cadena) ? trim($cadena) : false;

                    

                    if($cadena != false){

                    $arr = explode(" - ", $cadena);

                    $flag = true;
                        
                    echo "<tr>
                    <td style=text-align:left;padding-left:15px colspan=2>
                    $cadena
                    </td>
                    <td style=text-align:left;padding-left:15px colspan=2>
                    <a href=eliminar.php?legajo=$arr[4]>Eliminar</a>
                    </td>
                    </tr>";
                    }

                }

                if(!$flag){
                    echo "<tr> <td style=text-align:left;padding-left:15px colspan=2> No hay empleados en el archivo </td> </tr>";
                }

                fclose($ar);
                echo("<a href='../index.html'>Inicio</a>");
            }
        ?>
        <tr>
            <td style="text-align:left;padding-left:15px" colspan="5">
                <hr>
            </td>
        </tr>
    </table>
    
    <a href="../index.html">Alta de empleados</a>
    <a href="./backend/cerrarSesion.php">Cerrar sesion</a>
</body>
</html>