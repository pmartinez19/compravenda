<?php
    /**
     * CRUD
     * Class to handle CRUD operations 
     */
class crud extends conn{
    /**
     * @method __construct operation
     * 
     */
    public function __construct($host="localhost", $user = "pedro", $pass = "pedro", $db= "pelis"){
        parent::__construct($host, $user, $pass, $db);
    }

    /**
     * @method create
     * @param string $table
     * @param array $data
     * @return boolean
     */

    public function insertData($table, $data){
        $iterations = count($data);
        $sql = "INSERT INTO $table (";
        for ($i=0; $i < $iterations; $i++) { 
            $sql .= key($data) . ",";
            if ($i == $iterations-1) {
                $sql .= key($data). ")";
            }
        }
        $sql .= " VALUES (";
        for ($i=0; $i < $iterations; $i++) { 
            $sql .= "?,";
            if ($i == $iterations-1) {
                $sql .= "?)";
            }
        }
        $statament = $this->conn->prepare($sql);
        return $statament;
     
    }

    public function updateData($table, $data, $where){
        $iterations = count($data);
        $sql = "UPDATE $table SET ";
        for ($i=0; $i < $iterations; $i++) { 
            $sql .= key($data) . "=?,";
            if ($i == $iterations-1) {
                $sql .= key($data). "=?";
            }
        }
        $sql .= " WHERE $where";
        $statament = $this-> conn->prepare($sql);
        return $statament;
    }

    public function deleteData($table, $where){
        $sql = "DELETE FROM $table WHERE $where";
        $statament = $this->conn->prepare($sql);
        return $statament;
    }

    public function selectData($table, $where){
        $sql = "SELECT * FROM $table WHERE $where";
        $statament = $this->conn->prepare($sql);
        return $statament;
    }

    public function selectAllData($table){
        $sql = "SELECT * FROM $table";
        $statament = $this->conn->prepare($sql);
        return $statament;
    }
    
    public function bindParameters ($bind, $parameters){
        $iterations = count($parameters);
        for ($i=0; $i < $iterations; $i++) { 
            $bind->bindParam($i+1, $parameters[$i]);
        }
    }
        
}