<?php
    require_once("persona.php");

    class Empleado extends Persona
    {
        protected $_legajo;
        protected $_sueldo; 
        protected $_turno; 

        public function __construct($apellido, $dni, $nombre, $sexo, $legajo, $sueldo, $turno)
        {
            parent::__construct($apellido, $dni, $nombre, $sexo);
            $this->_legajo = $legajo;
            $this->_sueldo = $sueldo;
            $this->_turno = $turno;
        }
        
        public function GetLegajo()
        {
            return $this->_legajo;
        }

        public function GetSueldo()
        {
            return $this->_sueldo;
        }

        public function GetTurno()
        {
            return $this->_turno;
        }

        public function Hablar($idioma)
        {
            $cadena = "El empleado habla: ";
            $retorno = "";

            foreach($idioma as $item)
            {
                if($retorno != "")
                {
                    $retorno = $retorno . ", " . $item;
                }
                else
                {
                    $retorno = $retorno . $item;
                }
            }

            return $cadena . $retorno;
        }

        public function ToString()
        {
            return parent::ToString() . " - " . $this->GetLegajo() . " - " . $this->GetSueldo() . " - " . $this->GetTurno();
        }

    }
?>