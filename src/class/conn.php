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

    public function __construct($host="mariadb:host=localhost", $user = "pedro", $pass = "pedro", $db= "pelis") {
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
        try {
            $this->conn = new PDO ($this->host, $this->user, $this->pass);
            $this -> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $this -> error = $e->getMessage();
        }
        
    }
    
    public function close_connection() {
        $this ->conn ->null;
    }
    
    public function get_error() {
        return $this->error;
    }

}