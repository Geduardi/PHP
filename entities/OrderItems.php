<?php


namespace App\entities;


class Order_items extends Entity
{
    public $order_id;
    public $item_id;
    public $price;
    public $count;
}