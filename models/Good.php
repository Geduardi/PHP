<?php
namespace App\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $count;
    protected function getTableName()
    {
        return 'goods';
    }
}