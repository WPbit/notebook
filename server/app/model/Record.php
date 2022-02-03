<?php

namespace app\model;
use core\Database;

class Record
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAllRecords()
    {
        $sql = "SELECT id FROM records";
        return $this->pdo->getDbResult($sql);
    }

    public function getLimitRecords($pagination, $sort)
    {
        if ($sort) {
            $order_by = 'ORDER BY ' . $sort . ' ASC ';
        } else {
            $order_by = null;
        }

        $sql = 'SELECT id, name, email, text, admin_edit FROM records ' . $order_by . 'LIMIT ' . $pagination['itemStart'] . ', ' . $pagination['itemEnd'];
        return $this->pdo->getDbResult($sql);
    }

    public function getOneRecord($id)
    {
        $sql = 'SELECT id, name, email, text, admin_edit FROM records WHERE id = ' . $id;
        return $this->pdo->getDbResult($sql);
    }

    public function addNewRecord($name, $email, $text)
    {
        $sql = "INSERT INTO records(name, email, text, admin_edit) VALUES ('$name', '$email', '$text', '0')";
        $this->pdo->getDbResult($sql);

        return true;
    }

    public function editRecord($id, $text, $edited)
    {
        $sql = "UPDATE records SET text = '$text', admin_edit = '$edited' WHERE id = '$id'";
        $this->pdo->getDbResult($sql);
    }

}
