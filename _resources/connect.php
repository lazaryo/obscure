<?php

    Class Connection {
        private  $server = "mysql:host=localhost;dbname=obscure_sorrows";
        private  $user = "root";
        private  $pass = "root";
        private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);

        protected $con;
 
        public function openConnection() {
            try {
                $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
                return $this->con;
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }

        }

        public function closeConnection() {
            $this->con = null;
        }
    }

?>