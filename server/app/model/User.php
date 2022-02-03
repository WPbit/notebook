<?php

namespace app\model;
use core\Database;

class User
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function checkLoginPass($login, $pass)
    {
        $sql = "SELECT login, password FROM users WHERE login = '$login'";
        $res = $this->pdo->getDbResult($sql);

        if (!empty($res) && $res[0]['password'] == $pass) {
            return true;
        } else {
            return false;
        }
    }

}