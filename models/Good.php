<?php
namespace App\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $count;
    protected static function getTableName()
    {
        return 'goods';
    }
}