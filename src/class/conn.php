<?php
class conn {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conn;
    private $error;
   
    /**
     * Constructor de la clase
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string $db
     */

    public function __construct($host="localhost", $user = "pedro", $pass = "pedro", $db= "compravende") {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->bdh_connect();
    }
    public function get_conn(){
        return $this->conn;
    }
        
    public function bdh_connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ( $this -> conn -> connect_errno) {
            $this-> error = $this -> conn -> connect_errno;
            echo "Fallo al conectar a MySQL: (" . $this->error . ") " . $this->conn->connect_error;
            return false;
        }
        return true;
    }
    
    public function close_connection() {
        $this ->conn ->close();
    }
    
    public function get_error() {
        return $this->error;
    }

}