<?php


namespace App\entities;


class OrderItems extends Entity
{
    public $order_id;
    public $item_id;
    public $item_name;
    public $price;
    public $count;
}