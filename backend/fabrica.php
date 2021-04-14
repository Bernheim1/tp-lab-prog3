<?php
    require_once("empleado.php");
    require_once("interfaces.php");
    
    class Fabrica implements IArchivo
    {
        private $_cantidadMaxima;
        private $_empleados;
        private $_razonSocial;

        public function __construct($razonSocial, $cantidadMaxima = 5)
        {
            $this->_cantidadMaxima = $cantidadMaxima;
            $this->_empleados = array();
            $this->_razonSocial = $razonSocial;
        }

        public function AgregarEmpleado($empleado)
        {
            if($this->_cantidadMaxima > count($this->_empleados))
            {
                array_push($this->_empleados,$empleado);
                $this->EliminarEmpleadosRepetidos();
                return true;
            }
            return false;
        }

        public function CalcularSueldos()
        {
            $retorno = 0;

            foreach($this->_empleados as $item)
            {
                $retorno += $item->GetSueldo();
            }

            return $retorno;
        }

        public function EliminarEmpleado($empleado)
        {
            foreach($this->_empleados as $key => $index)
            {
                if($index->GetLegajo() === $empleado->GetLegajo())
                {
                    unset($this->_empleados[$key]);
                    return true;
                }
            } 
            return false;
        }

        private function EliminarEmpleadosRepetidos()
        {            
            $this->_empleados = array_unique($this->_empleados, SORT_REGULAR);
        }

        public function ToString()
        {
            $resultado = "Cantidad maxima de empleados: $this->_cantidadMaxima <br> Razon social: $this->_razonSocial <br>";

            foreach($this->_empleados as $item)
            {
                $resultado .= $item->ToString();
            }

            $resultado .= "Sueldo total a pagar: " . $this->CalcularSueldos() . "<br>";

            return $resultado;
        }

        public function TraerDeArchivo($nombreArchivo)
        {
            $archivo = fopen($nombreArchivo, "r");

            while(!feof($archivo)){
                $cadena = fgets($archivo);
                
                $arr = explode(" - ", $cadena);

                if($arr[0] != "" && $arr[0] != "\r\n"){
                    $auxEmpleado = new Empleado($arr[2], $arr[0], $arr[1], $arr[3], $arr[4], $arr[5], $arr[6]);
                    $this->AgregarEmpleado($auxEmpleado);
                }
            }

            fclose($archivo);

        }

        public function GuardarArchivo($nombreArchivo)
        {
            $archivo = fopen($nombreArchivo,"w");
            if(file_exists($nombreArchivo))
            {
                foreach($this->_empleados as $item)
                {
                    $cadena = $item->ToString() . "\r\n";
                    fwrite($archivo,$cadena);
                }
                fclose($archivo);
                return true;
            }
            return false;
        }
    }

?>