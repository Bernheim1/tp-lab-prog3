<?php

    session_start();

    function ValidarSesion($path){
        if($_SESSION["DNIEmpleado"] == false){
            header("Location: $path");
        }
    }

?>