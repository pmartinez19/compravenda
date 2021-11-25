<?
/**
 * Clase de conexion con la base de datos de compravende
 */
class conn {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conn;
    private $result;
    private $error;
    private $query;
   
    /**
     * Constructor de la clase
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string $db
     */
    public function __construct($host, $user, $pass, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->doconnect();
    }
    public function doconnect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass);
        if ( $this -> conn -> connect_errno) {
            $this->error = $this -> conn -> connect_errno;
            return false;
        }
        
        return true;
    }
    public function prepareQuery($query){
        $statament = $this->conn->prepare($query);
        return $statament;
    }
    public function mysql_connect() {
        $this ->conn ->close();
        return $this->conn;
    }
    public function mysql_result() {
        return $this->result;
    }


};