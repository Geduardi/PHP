<?php


namespace App\controllers;


use App\models\Good;

class GoodController extends Controller
{
    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        $good = Good::getOne($id);
        return $this->render('goodOne', ['good'=>$good]);
    }
    public function allAction()
    {
        $goods = Good::getAll();
        return $this->render('goodAll', ['goods'=>$goods]);
    }
}