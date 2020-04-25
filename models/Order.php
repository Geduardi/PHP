<?php

namespace App\models;

class Order extends Model
{
    protected function getTableName()
    {
        return 'orders';
    }
}