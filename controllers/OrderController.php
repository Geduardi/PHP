<?php


namespace App\controllers;


use App\entities\Order;

class OrderController extends Controller
{
    public function oneAction()
    {
        $id = 0;
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
        }
//        $order = $this->getRepository('Order')->getOne($id);
        $orderItems = $this->getRepository('OrderItems')->getAllInOrder($id);
        return $this->render('orderOne', [
            'order_items'=>$orderItems,
            'menu'=>$this->getMenu()
        ]);
    }
    public function allAction()
    {
        $request = $this->app->request;
        if (!$request->isLogged()){
            $request->redirectApp('Нужно авторизоваться!', '/auth');
        }
        if ($request->idAdmin()){
            $orders = $this->getRepository('Order')->getAll();
            return $this->render('orderAll', [
                'orders'=>$orders,
                'isAdmin'=>true,
                'menu'=>$this->getMenu(),
                'title'=>'Все заказы'
            ]);
        }
        $orders = $this->getRepository('Order')->getAllUserOnly($request->getSession('user_id'));
        return $this->render('orderAll', [
            'orders'=>$orders,
            'menu'=>$this->getMenu(),
            'title'=>'Все заказы'
        ]);

    }

    public function prepareAction()
    {
        $request = $this->app->request;
        if (!$request->isLogged()){
            $request->redirectApp('Нужно авторизоваться','/auth');
        } else {
            return $this->render('orderPrepare', [
                'menu'=>$this->getMenu(),
                'title'=>'Подготовка заказа'
            ]);
        }
    }

    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = $this->app->request;
            $order = new Order();
            $order->user_id = $request->getSession('user_id');
            $order->adress = $_POST['adress'];

            $this->getRepository('Order')->save($order);
//            $order->order_items = $request->getSession('goods');
            $this->app->OrderServices->insertItemsInOrder($order->id,$request, $this->getRepository('OrderItems'));
            unset($_SESSION['goods']);
            $request->redirectApp('Заказ заведен', '/order');
            return '';
        }

        return $this->render(
            'orderAll',
            [
                'menu' => $this->getMenu(),
            ]
        );
    }

    public function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = $this->app->request;
            if (!$request->idAdmin()){
                return $this->render('404');
            }
            $order = new Order();
            $order->id = $_POST['order_id'];
            $order->status = $_POST['status'];
            $this->getRepository('Order')->save($order);
            $request->redirectApp('Заказ заведен', '/order');
            return '';
        }

        return $this->render(
            'orderAll',
            [
                'menu' => $this->getMenu(),
            ]
        );
    }

    public function deleteAction()
    {
            $request = $this->app->request;
            $id = $request->getId();
            if (empty($id)){
                return $this->render('404');
            }
            $order = new Order();
            $order->id = $id;
            $this->getRepository('Order')->delete($order);
            $request->redirectApp('Заказ удален');
    }
}