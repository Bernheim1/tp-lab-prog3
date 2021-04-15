<?php
    require_once("./backend/empleado.php");
    require_once("./backend/fabrica.php");
    require_once("./backend/validarSesion.php");
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : 0; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML 5 - Formulario Alta Empleado</title>
    <script src="javascript/funciones.js"></script>
</head>
<body>
    <?php
        ValidarSesion("./login.html");
    ?>
    <h2>Alta de Empleados</h2>
    <table align="center">
        <form action="./backend/administracion.php" method="POST">
            <tr>
                <th style="text-align:left;padding-left:15px" colspan="2">
                    <h4>Datos Personales</h4>
                </th>
                <tr>
                    <td style="text-align:left;padding-left:15px" colspan="5">
                        <hr>
                    </td>
                </tr>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">DNI: </td>
                <td >
                    <input type="number" min="1000000" max="55000000" name="txtDni" id="txtDni">
                    <span id="spanTxtDni" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Apellido: </td>
                <td>
                    <input type="text" name="txtApellido" id="txtApellido">
                    <span id="spanTxtApellido" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Nombre: </td>
                <td>
                    <input type="text" name="txtNombre" id="txtNombre">
                    <span id="spanTxtNombre" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Sexo: </td>
                <td>
                    <select name="comboSexo" id="comboSexo">
                        <option value="---">Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                    <span id="spanComboSexo" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="5">
                     <hr>
                </td>
            </tr>
            <tr>
                <th style="text-align:left;padding-left:15px" colspan="2">
                    <h4>Datos Laborales</h4>
                </th>
                <tr>
                    <td style="text-align:left;padding-left:15px" colspan="5">
                        <hr>
                    </td>
                </tr>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Legajo: </td>
                <td >
                    <input type="number" min="100" max="550" name="txtLegajo" id="txtLegajo">
                    <span id="spanTxtLegajo" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Sueldo: </td>
                <td>
                    <input type="number" min="8000" step="500" name="txtSueldo" id="txtSueldo">
                    <span id="spanTxtSueldo" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Turno: </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:100px" colspan="2">
                    <input type="radio" name="rdoTurno" value="0" checked="checked">
                </td>
                <td>Mañana</td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:100px" colspan="2">
                    <input type="radio" name="rdoTurno" value="1">
                </td>
                <td>Tarde</td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:100px" colspan="2">
                    <input type="radio" name="rdoTurno" value="2">
                </td>
                <td>Noche</td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">Foto: </td>
                <td>
                    <input type="file" name="inputFoto" id="inputFoto">
                    <span id="spanFoto" style="display: none;">*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="5">
                    <hr>
                </td>
            </tr>
            <td colspan="5" align="right">
                <input type="reset" value="Limpiar">
            </td>
        </tr>
        <tr>
            <td colspan="5" align="right">
                <input type="submit" value="Enviar" name="btnEnviar" id="btnEnviar" onClick="AdministrarValidaciones(event)">
            </td>
        </tr>
        <tr>
            <td colspan="5" align="right">
            <a href="./backend/cerrarSesion.php">Cerrar sesion</a>
            </td>
        </tr>
        </form>
    </table>
</body>
</html>