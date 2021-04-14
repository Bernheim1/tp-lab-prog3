const ValidarCamposVacios : Function = (id: string) : boolean =>{
    let aux : string = (<HTMLInputElement> document.getElementById(id)).value;

    aux = aux.replace(/ /g, "");

    if(aux === "" || aux == undefined){
        return false;
    }else{
        return true;
    }
    
}

const ValidarRangoNumerico : Function = (numero : number, min : number, max: number) : boolean =>{
    
    if(numero >= min && numero <= max){
        return true;
    }
    return false;
}

const ValidarCombo : Function = (id: string, valor: string) : boolean =>{
    let aux : string = (<HTMLInputElement> document.getElementById(id)).value;

    if(aux == valor){
        return false;
    }
    return true;
}

var ObtenerTurnoSeleccionado : Function = () : string =>
{
    const obtenido : NodeListOf<HTMLInputElement> = document.querySelectorAll('input[name="rdoTurno"]'); 
    var aux : number = 0;

    for(let i : number = 0; i < obtenido.length;i++)
    {
        if(obtenido[i].checked)
        {
            aux = parseInt(obtenido[i].value);
        }
    } 
   switch(aux)
   {
       case 0:
           return "Mañana";
        case 1:
            return "Tarde";
        default:
            return "Noche";
   }
}

const ObtenerSueldoMaximo : Function = (turno: string) : number =>{
    switch(turno){
        case "Mañana":
            return 20000;
        case "Tarde:":
            return 18500;
        case "Noche":
            return 25000;
        default:
            return 1;
    }
}

const AdministrarSpanError : Function = (id : string, bool : boolean) : void => {
    let aux: HTMLElement = (<HTMLElement> document.getElementById(id));

    if(bool){
        aux.style.display = "block";
    }else{
        aux.style.display = "none";
    }
}

const VerificarValidacionesLogin : Function = () : boolean => {

    let dni : string = (<HTMLElement> document.getElementById("spanTxtDniLogin")).style.display;
    let apellido : string = (<HTMLElement> document.getElementById("spanTxtApellidoLogin")).style.display;

    if(dni == "none" && apellido == "none"){
        return true;
    }

    return false;
}


