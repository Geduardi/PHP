<?php


namespace App\repositories;



use App\entities\Entity;
use App\entities\Order;

class OrderRepository extends Repository
{
    protected function getTableName()
    {
        return 'orders';
    }

    protected function getEntityName()
    {
        return Order::class;
    }

    public function getAllUserOnly($user_id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE user_id =:user_id";
        $params = [':user_id'=>$user_id];
        return $this->db->findAll($sql, $this->getEntityName(),$params);
    }

    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $params = [':id' => $entity->id];
        $this->db->exec($sql,$params);

        $sql = "DELETE FROM order_items WHERE order_id = :id";
//        $params = [':id' => $entity->id];
        $this->db->exec($sql,$params);
    }
}