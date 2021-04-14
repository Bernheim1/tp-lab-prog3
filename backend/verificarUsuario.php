<?php

    $dni = isset($_POST["txtDniLogin"]) ? $_POST["txtDniLogin"] : 0;
    $apellido = isset($_POST["txtApellidoLogin"]) ? $_POST["txtApellidoLogin"] : 0;

    $path = "../archivos/empleados.txt";

    if(file_exists($path)){
        
        $ar = fopen($path, "r");
        $flag = false;

        while(!feof($ar)){

            $cadena = fgets($ar);
            $cadena = is_string($cadena) ? trim($cadena) : false;
    
            if($cadena != false){

                $arr = explode(" - ", $cadena);

                if($arr[0] == $dni && $arr[2] == $apellido){
                    $flag = true;
                    break;
                }
            }
            
        }

        if($flag){
            session_start();
            $_SESSION["DNIEmpleado"] = $dni;
            header("Location: mostrar.php");
        }else{
            echo "No se encontró empleado con ese dni";
            echo "<a href=../login.html>Login</a>";
        }

    }

?>