<?php

namespace app\controller;

use app\model\Record;
use core\Controller;

class Edit extends Controller
{
    public function editNote()
    {
        if (!empty($_GET['rec'])) {
            $recid = $_GET['rec'];
        }
        else {
            $recid = null;
        }

        $records = new Record();

        if (isset($_SESSION['login'])) {

            if (!empty($_POST['id']) && !empty($_POST['text'])) {

                $edited = !empty($_POST['edited']) ? $_POST['edited'] : 0;

                $records->editRecord($_POST['id'], htmlspecialchars($_POST['text']), $edited);

                $_SESSION['alerts'] = ['success' => 'Изменения сохранены'];

                header('location: ' . START_PAGE);

            } else {

                $title = 'Редактор задачи';
                $h1 = 'Редактировать задачу';

                $record = $records->getOneRecord($recid);

                $this->content_data = compact('title', 'h1', 'record');

                $this->getView(__FUNCTION__);

            }
        } else {
            header('location: ' . START_PAGE);
        }
    }
}
