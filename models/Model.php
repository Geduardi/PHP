<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    protected $db;

    abstract protected static function getTableName();

    public function __construct()
    {
        $this->db = static::getDB();
    }

    protected static function getDB():DB
    {
        return DB::getInstance();
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $params = [':id'=>$id];
        return static::getDB()->find($sql,static::class,$params);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDB()->findAll($sql, static::class);
    }

    protected function insert()
    {
        $tableName = static::getTableName();
        $columns = [];
        foreach ($this as $fieldName => $value) {
            if ($fieldName == 'id' || is_object($value)){
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
    }

    protected function update()
    {
        $tableName = static::getTableName();
        $sql = "UPDATE $tableName SET ";
        foreach ($this as $fieldName => $value) {
            if (is_object($value)){
                continue;
            }
            $sql .= "$fieldName = :$fieldName,";
            $params[":$fieldName"] = $value;
        }
        $sql = substr($sql, 0, -1) . " WHERE id = :id";
        $params[':id'] = $this->id;
        $this->db->exec($sql,$params);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $params = [':id' => $this->id];
        $this->db->exec($sql,$params);
    }

    public function save()
    {
        if (empty($this->id)){
            $this->insert();
        } else{
            $this->update();
        }
    }
}