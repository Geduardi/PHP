<?php
namespace App\repositories;

use App\entities\User;

class UserRepository extends Repository
{
    protected function getTableName()
    {
        return 'users';
    }

    protected function getEntityName()
    {
        return User::class;
    }

    public function passCheck($name,$password){
        $sql = "SELECT * FROM {$this->getTableName()} WHERE login=:login";
        $params = [':login'=>$name];
        $user = $this->db->find($sql,$this->getEntityName(),$params);
        if (empty($user)){
            return null;
        }
        if (password_verify($password,$user->password)){
            return $user;
        } else {
            return null;
        }

    }

    public function loginDuplicate($login)
    {
        $sql = "SELECT login FROM {$this->getTableName()} WHERE login=:login";
        $params = [':login'=>$login];
        $user = $this->db->find($sql,$this->getEntityName(),$params);
        if (!$user){
            return false;
        } else {
            return true;
        }
    }
}