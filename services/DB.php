<?php
namespace App\services;

use App\core\Container;
use App\repositories\Repository;
use App\traits\SingletonT;

class DB implements DBI
{

    protected $config = [];
    protected $connection;
    protected $container;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param $repositoryName
     * @return Repository|null
     */

    public function getRepository($repositoryName)
    {
        if (empty($this->container)){
            return null;
        }
        $repositoryName .= 'Repository';
        return $this->container->$repositoryName;
    }

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
        $this->query($sql,$params);
    }
    public function lastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }
}