<?php
namespace App;

class Database {
    private $connection;
    private $host;
    private $db_name;
    private $user;
    private $password;

    public function __construct($env) {
        $this->host = $env['DB_HOST'];
        $this->db_name = $env['DB_NAME'];
        $this->user = $env['DB_USER'];
        $this->password = $env['DB_PASSWORD'];
    }

    public function connect() {
        $this->connection = null;

        try {
            $this->connection = new \PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->user,
                $this->password,
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
        } catch (\PDOException $e) {
            throw new \Exception('Database Connection Error: ' . $e->getMessage());
        }

        return $this->connection;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
