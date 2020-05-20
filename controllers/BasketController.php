<?php

namespace App\controllers;

use App\entities\Good;
use App\repositories\GoodRepository;

class BasketController extends Controller
{
    protected $defaultAction = 'my';

    public function addAction()
    {
        $request = $this->app->request;
        /** @var GoodRepository $goodRepository */
        $goodRepository = $this->getRepository('Good');
        $hasAdd = $this->app->BasketServices->add($request,$goodRepository);

        if (!$hasAdd) {
            return $this->render('404');
        }

        $request->redirectApp('Товар добавлен в корзину');
        return '';
    }

    public function delAction()
    {
        $request = $this->app->request;
        $hasDel = $this->app->BasketServices->del($request);

        if (!$hasDel) {
            return $this->render('404');
        }

        $request->redirectApp('Товар удален из корзину');
        return '';
    }

    public function delAllAction()
    {
        $request = $this->app->request;
        $hasDel = $this->app->BasketServices->delAll($request);

        if (!$hasDel) {
            return $this->render('404');
        }

        $request->redirectApp('Товар удален из корзину');
        return '';
    }


    public function myAction()
    {
//        var_dump($_SESSION);
        return $this->render('Cart', [
            'cart'=>$_SESSION['goods'],
            'menu'=>$this->getMenu(),
            'title'=>'Товары в корзине'
        ]);
    }
}