<?php

namespace app\controller;

use core\Controller;
use app\model\User;

class Login extends Controller
{
    public function login()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            $login = $_POST['login'];
            $pass = $_POST['password'];

            $user = new User();

            if ($user->checkLoginPass($login, $pass)) {
                $_SESSION['login'] = true;
                header('location: ' . START_PAGE);
            } else {
                $_SESSION['alerts'] = ['err' => 'Неверный логин или пароль'];
            }
        }

        if (isset($_SESSION['login'])) {
            header('location: ' . START_PAGE);
        } else {

            $title = 'Вход в аккаунт';
            $h1 = 'Вход для администратора';

            $this->content_data = compact('title', 'h1');

            $this->getView(__FUNCTION__);

        }
    }

    public function logout()
    {
        if ($_SESSION['login']) {
            unset($_SESSION['login']);
        }
        header('location: ' . START_PAGE);
    }

}
