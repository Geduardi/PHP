<?php


namespace App\repositories;


use App\entities\Entity;
use App\services\DB;

abstract class Repository
{
    /**
     * @var DB
     */
    protected $db;

    abstract protected function getTableName();
    abstract protected function getEntityName();

    public function __construct()
    {
        $this->db = static::getDB();
    }

    protected static function getDB():DB
    {
        return DB::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $params = [':id'=>$id];
        return static::getDB()->find($sql,$this->getEntityName(),$params);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDB()->findAll($sql, $this->getEntityName());
    }

    protected function insert(Entity $entity)
    {
        $tableName = static::getTableName();
        $columns = [];
        foreach ($entity as $fieldName => $value) {
            if ($fieldName == 'id'){
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
            $sql .= "$fieldName = :$fieldName,";
            $params[":$fieldName"] = $value;
        }
        $sql = substr($sql, 0, -1) . " WHERE id = :id";
        $params[':id'] = $this->id;
        $this->db->exec($sql,$params);
    }

    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $params = [':id' => $this->id];
        $this->db->exec($sql,$params);
    }

    public function save(Entity $entity)
    {
        if (empty($this->id)){
            $this->insert($entity);
        } else{
            $this->update($entity);
        }
    }
}