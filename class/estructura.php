<?php
    class Usuario{
        
        private $exito;
        private $vlrValido;
        var $conexion;
    
        function __construct($value) {
            $this->conexion=$value;
            $this->vlrValido = TRUE;
            $this->exito =FALSE;
        }
    
  
                public function lista($rowini,$rowfin,$str){
                    if($this->vlrValido){
                        return 1;
                    }
                }

                public function lista_todo(){//ENlista activos inactivos eliminados etc
                    if($this->vlrValido){
                        return 1;
                    }
                }

                public function listaByid(){
                    if($this->vlrValido){
                        return 1;
                    }
                }

                public function save(){
                    if($this->vlrValido){
                        return 1;
                    }
                }

                public function delete(){
                    if($this->vlrValido){
                        return 1;
                    }                    
                }
        
    }
?>