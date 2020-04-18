<?php
class User {
    public $id;
    public $login;
    public $age;
    public $email;

    public function __construct($login,$age,$email = '',$id = 0)
    {
        $this->login = $login;
        $this->id = $id;
        $this->age = $age;
        $this->email = $email;
    }

    public function display()
    {
        echo $this->getLogin(). $this->getAge() . $this->getEmail() . '<hr>';
    }

    protected function getLogin()
    {
        return 'Логин: ' . $this->login . '<br>';
    }

    protected function getAge()
    {
        return $this->age . ' лет<br>';
    }

    protected function getEmail()
    {
        return $this->email;
    }

    public function __get($name)
    {
       echo "Нет такого свойства";
    }

    public function __set($name, $value)
    {
        echo "Нет такого свойства";
    }
}

class UserAdmin extends user
{
    protected $isAdmin;
    public function __construct($login, $age, $isAdmin = false, $email = '', $id = 0)
    {
        $this->isAdmin = $isAdmin;
        parent::__construct($login, $age, $email, $id);
    }

    public function display()
    {
        echo $this->getLogin(). $this->getAge() . $this->getAdmin() . $this->getEmail() . '<hr>';
    }
    protected function getAdmin()
    {
        if ($this->isAdmin){
            echo 'Администратор<br>';
        }
    }

}


/**
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
 * Будет выводить 1 2 3 4, т.к. $x статичная переменная в области видимости класса "A" и не теряет свое значение при выходе из функции
 */

/**

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
 * Выведет 1 1 2 2, т.к. для "b1" будет создан отдельный класс со своей областью видимости, значение $x будет сохраниятся для каждого класса отдельно
 */

/**

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
 * Как и предыдущий, т.к. для инициализации никаких данных не требуется.
 */