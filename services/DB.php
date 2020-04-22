<?php
namespace App\services;

class DB implements DBI
{
    public function find(string $sql)
    {
        return $sql . '!!find!!';
    }

    public function findAll(string $sql)
    {
        return $sql . '!!findAll!!';
    }
}