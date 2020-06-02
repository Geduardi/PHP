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
        $hasAdd = $this->app->BasketServices->add($request, $goodRepository);

        if (!$hasAdd) {
            return $this->render('404');
        }

        $request->redirectApp('Товар добавлен в корзину');
        return '';
    }

    public function deleteAction()
    {
        $request = $this->app->request;
        $hasDel = $this->app->BasketServices->delete($request);

        if (!$hasDel) {
            return $this->render('404');
        }

        $request->redirectApp('Товар удален из корзину');
        return '';
    }

    public function deleteAllAction()
    {
        $request = $this->app->request;
        $hasDel = $this->app->BasketServices->deleteAll($request);

        if (!$hasDel) {
            return $this->render('404');
        }

        $request->redirectApp('Товар удален из корзину');
        return '';
    }


    public function myAction()
    {
        if ($this->app->request->isLogged()) {
            return $this->render('Cart', [
                'cart' => $_SESSION['goods'],
                'menu' => $this->getMenu(),
                'title' => 'Товары в корзине'
            ]);
        } else {
            $this->app->request->redirectApp('Нужно авторизоваться!', '/auth');
            return '';
        }
    }
}