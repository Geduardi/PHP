<?php


namespace App\services;


use App\entities\OrderItems;
use App\repositories\Order_itemsRepository;
use App\repositories\Repository;

class OrderServices
{
    public function insertItemsInOrder($order_id,Request $request, $repository)
    {
        $goods = $request->getSession('goods');
        foreach ($goods as $item_id => $item) {
            $order_item = new OrderItems();
            $order_item->order_id = $order_id;
            $order_item->price = $item['price'];
            $order_item->count = $item['count'];
            $order_item->item_id= $item_id;
            $order_item->item_name = $item['name'];
            $repository->save($order_item);
        }
    }
}