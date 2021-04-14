<?php

    require_once("empleado.php");
    require_once("persona.php");
    require_once("fabrica.php");

    $objetoA = new Fabrica("Postman");
    $objeto1 = new Empleado("Gonzales", 40258963, "Roberto", "Masculino", 105643, 50621, "Mañana");
    $objeto2 = new Empleado("Perez", 40778521, "Rodrigo", "Masculino", 104520, 54632, "Tarde");
    $objeto3 = new Empleado("Rodriguez", 42650971, "Ana", "Femenino", 113042, 59631, "Noche");

    echo($objeto1->ToString());
    echo($objeto2->Hablar(["Ingles","Español"]) . "<br> <br>");

    $objetoA->AgregarEmpleado($objeto1);
    $objetoA->AgregarEmpleado($objeto2);
    $objetoA->AgregarEmpleado($objeto3);
    
    echo($objetoA->ToString());

    $objetoA->EliminarEmpleado($objeto2);


    echo("<br>");
    echo($objetoA->ToString());

?>