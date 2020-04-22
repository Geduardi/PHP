<?php
namespace App\models;

abstract class Model
{
    protected $db;

    abstract protected function getTableName();

    public function __construct(\App\services\DBI $db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = $id";
        return $this->db->find($sql);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->find($sql);
    }
}