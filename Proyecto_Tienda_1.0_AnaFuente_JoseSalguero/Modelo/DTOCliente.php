<?php
    class DTOCliente{
        private $id;
        private $nombre;
        private $apellido;
        private $nickname;
        private $password;
        private $telefono;
        private $domicilio;
    public function __construct($id,$nombre, $apellido, $nickname, $password, $telefono, $domicilio)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getApellido()
        {
            return $this->apellido;
        }

        /**
         * @param mixed $apellido
         */
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getNickname()
        {
            return $this->nickname;
        }

        /**
         * @param mixed $nickname
         */
        public function setNickname($nickname)
        {
            $this->nickname = $nickname;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getTelefono()
        {
            return $this->telefono;
        }

        /**
         * @param mixed $telefono
         */
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        /**
         * @return mixed
         */
        public function getDomicilio()
        {
            return $this->domicilio;
        }

        /**
         * @param mixed $domicilio
         */
        public function setDomicilio($domicilio)
        {
            $this->domicilio = $domicilio;
        }
    }
?>