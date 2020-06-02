<?php


namespace App\controllers;



class AuthController extends Controller
{
    protected $defaultAction = 'login';

    public function logOnAction()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST'){
            $request = $this->app->request;
            $hasLogged = $this->app->AuthServices->checkLogin($request, $this->getRepository('User'));
            if (!$hasLogged) {
                $request->redirectApp('Неправильные логин или пароль');
            } else{
                $request->redirectApp('Успешная авторизация');
            }
        }
    }

    public function logOutAction()
    {
        $request = $this->app->request;
        $request->sessionDestroy();
        $request->redirectApp();
    }



    public function loginAction()
    {
        $request = $this->app->request;
        if ($request->isLogged()){
            return $this->render('authLogin', [
                'message' => $request->getMsg(),
                'isLogged'=> true,
                'login' => $request->getSession('login'),
                'fio' => $request->getSession('name'),
                'menu'=>$this->getMenu(),
                'title'=>'Личный кабинет'
            ]);
        }
        return $this->render('authLogin', [
            'message' => $request->getMsg(),
            'isLogged'=> false,
            'menu'=>$this->getMenu(),
            'title'=>'Личный кабинет'
        ]);
    }

    public function registerAction()
    {
            $request = $this->app->request;
            if ($request->isLogged()) {
                $request->redirectApp('Уже вошли!', '/auth');
                return '';
            } else {
                return $this->render('authRegister', [
                    'message' => $request->getMsg(),
                    'menu' => $this->getMenu(),
                    'title' => 'Регистрация'
                ]);
            }
    }

    public function signUpAction()
    {
        $request = $this->app->request;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $registartionSuccsess = $this->app->AuthServices->registration($request, $this->getRepository('User'));
            if (!$registartionSuccsess){
                $request->redirectApp('Ошибка регистрации');
                return '';
            } else{
                $request->redirectApp('Успешная регистрация','/auth');
                return '';
            }
        }
    }
}