<?php

namespace App\models;

class Order extends Model
{
    protected static function getTableName()
    {
        return 'orders';
    }
}