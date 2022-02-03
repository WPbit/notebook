<?php

namespace app\controller;

use app\model\Record;
use core\Controller;

class Add extends Controller
{
    public  function  addRecord()
    {
        if (!empty($_POST['name']) && !empty($_POST['email'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];

            if (isset($_POST['text'])) {
                $text = $_POST['text'];
            } else {
                $text = 'no any notes';
            }

            $records = new Record();
            $records->addNewRecord($name, $email, $text);

            $_SESSION['alerts'] = ['success' => 'Вы успешно добавили заметку'];

            header('location: ' . START_PAGE);
        }

        $title = 'Добавление задачи';
        $h1 = 'Добавить задачу';

        $this->content_data = compact('title', 'h1');

        $this->getView(__FUNCTION__);
    }
}
