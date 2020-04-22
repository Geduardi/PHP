<?php
namespace App\services;

interface DBI
{

    /**
     * @param string $sql
     * @return mixed
     */
    public function find(string $sql);
    public function findAll(string $sql);
}