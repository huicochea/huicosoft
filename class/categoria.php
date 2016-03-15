<?php
    class Categoria{
        private $id_categoria;
        private $nombre;
        private $descripcion;
        private $fecha_alta;
        private $id_estatus;
        private $imagen;

        private $exito;
        private $vlrValido;
        var $conexion;
    
        function __construct($value) {
            $this->conexion=$value;
            $this->vlrValido = TRUE;
            $this->exito =FALSE;
        }
    
        function getId_categoria() {
            return $this->id_categoria;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getDescripcion() {
            return $this->descripcion;
        }

        function getFecha_alta() {
            return $this->fecha_alta;
        }

        function getId_estatus() {
            return $this->id_estatus;
        }

        function getImagen() {
            return $this->imagen;
        }

        function getExito() {
            return $this->exito;
        }

        function getVlrValido() {
            return $this->vlrValido;
        }

        function getConexion() {
            return $this->conexion;
        }

        function setId_categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        function setFecha_alta($fecha_alta) {
            $this->fecha_alta = $fecha_alta;
        }

        function setId_estatus($id_estatus) {
            $this->id_estatus = $id_estatus;
        }

        function setImagen($imagen) {
            $this->imagen = $imagen;
        }

        function setExito($exito) {
            $this->exito = $exito;
        }

        function setVlrValido($vlrValido) {
            $this->vlrValido = $vlrValido;
        }

        function setConexion($conexion) {
            $this->conexion = $conexion;
        }

        public function lista($rowini=0,$rowfin=10,$str=''){
            if($this->vlrValido)
            {
                    return 1;
            }
        }

        public function lista_todo()
        {//ENlista activos inactivos eliminados etc
            if($this->vlrValido)
            {
                return 1;
            }
        }

        public function listaByid()
        {
            if($this->vlrValido)
            {
                return 1;
            }
        }

        public function save()
        {
            if($this->vlrValido)
            {
                return 1;
            }
        }

        public function delete()
        {
            if($this->vlrValido)
            {
                return 1;
            }                    
        }

    }
?>