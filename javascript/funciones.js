var AdministrarValidaciones = function (e) {
    var dni = parseInt(document.getElementById("txtDni").value);
    var sueldo = parseInt(document.getElementById("txtSueldo").value);
    var legajo = parseInt(document.getElementById("txtLegajo").value);
    var sueldoMax = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    if (!ValidarCamposVacios("txtNombre")) {
        AdministrarSpanError("spanTxtNombre", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtNombre", false);
    }
    if (!ValidarCamposVacios("txtApellido")) {
        AdministrarSpanError("spanTxtApellido", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtApellido", false);
    }
    if (!ValidarRangoNumerico(dni, 1000000, 55000000)) {
        AdministrarSpanError("spanTxtDni", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtDni", false);
    }
    if (!ValidarRangoNumerico(sueldo, 8000, sueldoMax)) {
        AdministrarSpanError("spanTxtSueldo", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtSueldo", false);
    }
    if (!ValidarRangoNumerico(legajo, 100, 500)) {
        AdministrarSpanError("spanTxtLegajo", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtLegajo", false);
    }
    if (!ValidarCombo("comboSexo", "---")) {
        AdministrarSpanError("spanComboSexo", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanComboSexo", false);
    }
};
var AdministrarValicionesLogin = function (e) {
    var dni = parseInt(document.getElementById("txtDniLogin").value);
    if (!ValidarRangoNumerico(dni, 1000000, 55000000)) {
        AdministrarSpanError("spanTxtDniLogin", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanTxtDniLogin", false);
    }
    if (!ValidarCamposVacios("txtApellidoLogin")) {
        AdministrarSpanError("spanApellidoLogin", true);
        e.preventDefault();
    }
    else {
        AdministrarSpanError("spanApellidoLogin", false);
    }
};
var ValidarCamposVacios = function (id) {
    var aux = document.getElementById(id).value;
    aux = aux.replace(/ /g, "");
    if (aux === "" || aux == undefined) {
        return false;
    }
    else {
        return true;
    }
};
var ValidarRangoNumerico = function (numero, min, max) {
    if (numero >= min && numero <= max) {
        return true;
    }
    return false;
};
var ValidarCombo = function (id, valor) {
    var aux = document.getElementById(id).value;
    if (aux == valor) {
        return false;
    }
    return true;
};
var ObtenerTurnoSeleccionado = function () {
    var obtenido = document.querySelectorAll('input[name="rdoTurno"]');
    var aux = 0;
    for (var i = 0; i < obtenido.length; i++) {
        if (obtenido[i].checked) {
            aux = parseInt(obtenido[i].value);
        }
    }
    switch (aux) {
        case 0:
            return "Mañana";
        case 1:
            return "Tarde";
        default:
            return "Noche";
    }
};
var ObtenerSueldoMaximo = function (turno) {
    switch (turno) {
        case "Mañana":
            return 20000;
        case "Tarde:":
            return 18500;
        case "Noche":
            return 25000;
        default:
            return 1;
    }
};
var AdministrarSpanError = function (id, bool) {
    var aux = document.getElementById(id);
    if (bool) {
        aux.style.display = "block";
    }
    else {
        aux.style.display = "none";
    }
};
var VerificarValidacionesLogin = function () {
    var dni = document.getElementById("spanTxtDniLogin").style.display;
    var apellido = document.getElementById("spanTxtApellidoLogin").style.display;
    if (dni == "none" && apellido == "none") {
        return true;
    }
    return false;
};
