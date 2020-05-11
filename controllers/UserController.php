<?php

namespace App\controllers;

use App\entities\User;
use App\repositories\UserRepository;

class UserController extends Controller
{

    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        $user = (new UserRepository())->getOne($id);
        return $this->render('userOne', [
            'user'=>$user,
            'menu'=>$this->getMenu()
        ]);
    }
    public function allAction()
    {
        $users = (new UserRepository())->getAll();
        return $this->render('userAll', [
            'users'=>$users,
            'menu'=>$this->getMenu(),
            'title'=>'Все пользователи'
        ]);
    }
    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->fio = $_POST['fio'];

            (new UserRepository())->save($user);
            header('Location: /user/all' );
            return '';
        }

        return $this->render(
            'userAdd',
            [
                'menu' => $this->getMenu(),
            ]
        );
    }



}