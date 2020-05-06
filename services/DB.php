<?php
namespace App\services;

use App\traits\SingletonT;

class DB implements DBI
{

    use SingletonT;

    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'gbphp',
        'charset' => 'UTF8',
        'username' => 'root',
        'password' => '',
    ];

    protected $connection;

    public function getConnection()
    {
        if (!empty($this->connection)){
            return $this->connection;
        }
        $this->connection = new \PDO(
            $this->getSdnString(),
            $this->config['username'],
            $this->config['password']
        );
        $this->connection->setAttribute(
            \PDO::ATTR_DEFAULT_FETCH_MODE,
            \PDO::FETCH_ASSOC
        );

        return $this->connection;
    }

    protected function getSdnString()
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['dbname'],
            $this->config['charset']
        );
    }

    protected function query(string $sql, array $params = [])
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    public function find(string $sql, $class, array $params = [])
    {
        return $this->query($sql,$params)->fetchObject($class);
    }

    public function findAll(string $sql, $class, array $params = [])
    {
        return $this->query($sql,$params)->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function exec(string $sql, array $params = [])
    {
        var_dump($sql);
        var_dump($params);
        var_dump($this->query($sql,$params)->errorInfo());
    }
}