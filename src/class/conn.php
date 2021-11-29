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

    public function __construct($host="localhost", $user = "pedro", $pass = "pedro", $db= "pelis") {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->bdh_connect();
    }
        
    public function bdh_connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass);
        if ( $this -> conn -> connect_errno) {
            $this-> error = $this -> conn -> connect_errno;
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