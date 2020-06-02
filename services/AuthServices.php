<?php


namespace App\services;




use App\entities\User;
use App\repositories\UserRepository;

class AuthServices
{
    public function checkLogin(Request $request, $repository){
        if (empty($_POST['login']) || empty($_POST['password'])){
            return false;
        }
        $login  =  $_POST['login'];
        $password = $_POST['password'];

        $user = $repository->passCheck($login,$password);

        if (empty($user)){
            return false;
        }

        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['name'] = $user->fio;
        $_SESSION['isAdmin'] = $user->isAdmin;
        $_SESSION['user_id'] = $user->id;

        return true;
    }

    public function registration(Request $request, $repository)
    {
        /**
         * @var UserRepository $repository
         */
        if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['name'])){
            return false;
        }

        $user = new User();
        $user->login  =  $_POST['login'];
        $user->password  = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $user->fio  = $_POST['name'];
        $user->isAdmin = 0;

        if ($repository->loginDuplicate($user->login)) {
            return false;
        }

        $repository->save($user);

        $request->setSession('user_id',$user->id);
        $request->setSession('auth',true);
        $request->setSession('login',$user->login);
        $request->setSession('name',$user->fio);

        return true;


    }


}