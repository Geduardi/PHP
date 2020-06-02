<?php

namespace App\controllers;

use App\entities\Good;
use App\repositories\GoodRepository;

class GoodController extends Controller
{
    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        $good = $this->getRepository('Good')->getOne($id);
        return $this->render('goodOne', [
            'good'=>$good,
            'menu'=>$this->getMenu()
        ]);
    }
    public function allAction()
    {
        $goods = $this->getRepository('Good')->getAll();
        return $this->render('goodAll', [
            'goods'=>$goods,
            'menu'=>$this->getMenu(),
            'title'=>'Все товары'
        ]);
    }
    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $good = new Good();
            $good->name = $_POST['name'];
            $good->count = $_POST['count'];
            $good->price = $_POST['price'];

            $this->getRepository('Good')->save($good);
            header('Location: /good/all' );
            return '';
        }

        return $this->render(
            'goodAdd',
            [
                'menu' => $this->getMenu(),
            ]
        );
    }
}