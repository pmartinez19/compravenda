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
    private $rows;
    private $num_rows;

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
    }
    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass);
        if (!$this->conn) {
            $this->error = mysql_error();
            return false;
        }
        if (!mysql_select_db($this->db, $this->conn)) {
            $this->error = mysql_error();
            return false;
        }
        return true;
    }
    public function query($query) {
        $this->query = $query;
        $this->result = mysql_query($this->query, $this->conn);
        if (!$this->result) {
            $this->error = mysql_error();
            return false;
        }
        return true;
    }
    public function mysql_connect() {
        return $this->conn;
    }
    public function mysql_result() {
        return $this->result;
    }


};