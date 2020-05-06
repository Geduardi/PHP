<?php
namespace App\services;

interface DBI
{

    /**
     * @param string $sql
     * @param $class
     * @return mixed
     */
    public function find(string $sql, $class);
    public function findAll(string $sql, $class);
}