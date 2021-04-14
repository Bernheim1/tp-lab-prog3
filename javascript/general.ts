const AdministrarValidaciones : Function = (e: Event) =>{
    let dni: number = parseInt((<HTMLInputElement> document.getElementById("txtDni")).value);
    let sueldo: number = parseInt((<HTMLInputElement> document.getElementById("txtSueldo")).value);
    let legajo: number = parseInt((<HTMLInputElement> document.getElementById("txtLegajo")).value);
    let sueldoMax: number = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());

    if(!ValidarCamposVacios("txtNombre")){
        
        AdministrarSpanError("spanTxtNombre", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanTxtNombre", false);
    }

    if(!ValidarCamposVacios("txtApellido")){
        AdministrarSpanError("spanTxtApellido", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanTxtApellido", false);
    }

    if(!ValidarRangoNumerico(dni, 1000000,55000000)){
        AdministrarSpanError("spanTxtDni", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanTxtDni", false);
    }

    if(!ValidarRangoNumerico(sueldo, 8000, sueldoMax)){
        AdministrarSpanError("spanTxtSueldo", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanTxtSueldo", false);
    }

    if(!ValidarRangoNumerico(legajo, 100, 500)){
        AdministrarSpanError("spanTxtLegajo", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanTxtLegajo", false);
    }

    if(!ValidarCombo("comboSexo","---")){
        AdministrarSpanError("spanComboSexo", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanComboSexo", false);
    }
    
}

const AdministrarValicionesLogin : Function = (e: Event) => {
    let dni: number = parseInt((<HTMLInputElement> document.getElementById("txtDniLogin")).value);

    if(!ValidarRangoNumerico(dni, 1000000,55000000)){
        AdministrarSpanError("spanTxtDniLogin", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanTxtDniLogin", false);
    }

    if(!ValidarCamposVacios("txtApellidoLogin")){
        AdministrarSpanError("spanApellidoLogin", true);
        e.preventDefault();
    }else{
        AdministrarSpanError("spanApellidoLogin", false);
    }
}