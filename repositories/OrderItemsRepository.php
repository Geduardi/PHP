<?php


namespace App\repositories;




use App\entities\OrderItems;

class OrderItemsRepository extends Repository
{
    protected function getTableName()
    {
        return 'order_items';
    }

    protected function getEntityName()
    {
        return OrderItems::class;
    }

    public function getAllInOrder($order_id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE order_id = :order_id";
        $params = [':order_id'=>$order_id];
        return $this->db->findAll($sql, $this->getEntityName(),$params);
    }
}