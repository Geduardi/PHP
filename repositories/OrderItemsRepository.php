<?php


namespace App\repositories;


use App\entities\Order_items;

class Order_itemsRepository extends Repository
{
    protected function getTableName()
    {
        return 'order_items';
    }

    protected function getEntityName()
    {
        return Order_items::class;
    }
}