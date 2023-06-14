<?php 

namespace App;

use PDO;
use PDOException;

class Connect 
{
    public $conn;

    private $host;

    private $dbname;
    
    private $username;
    
    private $password;
    
    private array $errors;

    public function __construct()
    {}

    private function setConfig(): void 
    {
        $this->host     = DB_CONFIG['host'];
        $this->dbname   = DB_CONFIG['dbname'];
        $this->username = DB_CONFIG['username'];
        $this->password = DB_CONFIG['password'];
    }

    public function connect(): void
    {
        $this->setConfig();
        
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}"
                ,$this->username
                ,$this->password
            );
        } catch(PDOException $error) {
            $this->errors = $error->getMessage();
        }
    }

    public function errors()
    {
        if (empty($this->errors)) {
            return $this;
        }

        return $this->errors;
    }
}





