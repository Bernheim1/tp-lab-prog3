<?php

    session_start();

    function ValidarSesion($path){
        if($_SESSION["DNIEmpleado"] == False){
            header("Location: $path");
        }
    }

?>