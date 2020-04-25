<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    protected $db;

    abstract protected function getTableName();

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        $params = [':id'=>$id];
        return $this->db->find($sql,static::class,$params);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->findAll($sql, static::class);
    }

    protected function insert()
    {
        $sql = "INSERT INTO {$this->getTableName()} (:fields) VALUES (:values)";
        $params = [':fields' => '', ':values'=>''];
        foreach ($this as $fieldName => $value) {
            if ($fieldName == 'id' || is_object($value)){
                continue;
            }
            $params[':fields'] .= "$fieldName,";
            $params[':values'] .= "'$value',";
        }
        $this->db->exec($sql,$params);
    }

    protected function update()
    {
        $sql = "UPDATE {$this->getTableName()} SET :values WHERE id = {$this->id}";
        $params = [':values'=>''];
        foreach ($this as $fieldName => $value) {
            if (is_object($value)){
                continue;
            }
            $params[':values'] .= "$fieldName = '$value',";
        }
        $params[':values'] = substr($params[':values'],0,-1);
        $this->db->exec($sql,$params);
    }

    public function delete()
    {

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