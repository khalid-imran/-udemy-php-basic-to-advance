<?php

namespace Framework;

use Exception;
use PDO;
use PDOStatement;
class Database
{
    public $conn;

    /**
     *
     * @param array $config
     * @throws Exception
     */
    public function __construct(array $config)
    {
        $dsn = 'mysql:host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'];
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
           throw new Exception('Database connection error: '.$e->getMessage());
        }
    }

    /**
     *
     * @param string $query
     * @param array $params
     * @return false|PDOStatement
     * @throws Exception
     */
    public function query(string $query, array $params = []): false|PDOStatement
    {
        try {
            $stmt = $this->conn->prepare($query);
            foreach ($params as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception('Database query error: '.$e->getMessage());
        }
    }
}