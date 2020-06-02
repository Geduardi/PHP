<?php

namespace services;

use App\repositories\UserRepository;
use App\services\AuthServices;
use App\services\Request;
use PHPUnit\Framework\TestCase;

class AuthServicesTest extends TestCase
{
    /**
     * @dataProvider dataForEmptyLogigOrPasswordTest
     * @param $login
     * @param $password
     */
    public function testRegistrationEmptyLoginOrPassword($login,$password)
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repository = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $_POST['login']=$login;
        $_POST['password']=$password;
        $_POST['name']='name';

        $authServices = new AuthServices();
        $result = $authServices->registration($request,$repository);

        $this->assertFalse($result);

    }

    /**
     * @dataProvider dataForEmptyLogigOrPasswordTest
     * @param $login
     * @param $password
     */

    public function testCheckLoginEmptyLoginOrPassword($login,$password)
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repository = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repository->method('passCheck')
            ->willReturn(null);

        $_POST['login'] = $login;
        $_POST['password'] = $password;

        $authServices = new AuthServices();
        $result = $authServices->checkLogin($request,$repository);

        $this->assertFalse($result);
    }

    public function testCheckLoginEmptyUser()
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repository = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repository->method('passCheck')
            ->willReturn(null);

        $_POST['login'] = 'login';
        $_POST['password'] = 'password';

        $authServices = new AuthServices();
        $result = $authServices->checkLogin($request,$repository);

        $this->assertFalse($result);
    }

    public function dataForEmptyLogigOrPasswordTest()
    {
        return [
            [null , 'password'],
            ['login', null],
            [null,null]
        ];
    }
}
