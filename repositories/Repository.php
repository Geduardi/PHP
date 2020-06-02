<?php


namespace App\repositories;


use App\core\Container;
use App\entities\Entity;
use App\services\DB;

abstract class Repository
{
    /**
     * @var DB
     */
    protected $db;
    protected $container;

    abstract protected function getTableName();
    abstract protected function getEntityName();

    public function setContainer(Container $container)
    {
        $this->container = $container;
        $this->setDB();
    }

    private function setDB()
    {
        $this->db = $this->container->db;
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $params = [':id'=>$id];
        return $this->db->find($sql,$this->getEntityName(),$params);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->findAll($sql, $this->getEntityName());
    }

    protected function insert(Entity $entity)
    {
        $tableName = $this->getTableName();
        $columns = [];
        foreach ($entity as $fieldName => $value) {
            if ($fieldName == 'id' || $value == null){
                continue;
            }
            $columns[] = $fieldName;
            $params[":$fieldName"] = $value;
        }
        $sql = "INSERT INTO $tableName ("
            . implode(', ',$columns) .
            ") VALUES ("
            . implode(', ', array_keys($params)) .
            ")";
        $this->db->exec($sql,$params);
        $entity->id = $this->db->lastInsertId();
    }

    protected function update(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE $tableName SET ";
        foreach ($entity as $fieldName => $value) {
            if ($value == null || $fieldName == 'id'){
                continue;
            }
            $sql .= "$fieldName = :$fieldName,";
            $params[":$fieldName"] = $value;
        }
        $sql = substr($sql, 0, -1) . " WHERE id = :id";
        $params[':id'] = $entity->id;
        $this->db->exec($sql,$params);
    }

    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $params = [':id' => $entity->id];
        $this->db->exec($sql,$params);
    }

    public function save(Entity $entity)
    {
        if (empty($entity->id)){
            $this->insert($entity);
        } else{
            $this->update($entity);
        }
    }
}