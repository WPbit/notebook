<?php

namespace app\controller;

use app\model\Record;
use core\Controller;

class Main extends Controller
{
    public $howManyRecords = 3;

    public  function  recordsList()
    {
        $title = 'Задачи';
        $h1 = 'Список всех задач';

        $records = new Record();
        $allRecords = $records->getAllRecords();
        $pagination = $this->getPaginationLimit($allRecords);
        $showRecords = $records->getLimitRecords($pagination, $this->getSortCookie());

        $this->content_data = compact('title', 'h1', 'showRecords', 'pagination');

        $this->getView(__FUNCTION__);
    }

    public function getPaginationLimit($allRecords)
    {
        $pages = ceil(count($allRecords) / $this->howManyRecords);
        $pagination['countPages'] = $pages;

        if (isset($_GET['p'])) {

            switch ($_GET['p']) {
                case 1:
                    $pagination['itemStart'] = 0;
                    $pagination['itemEnd'] = $this->howManyRecords;
                    break;
                default:
                    $pagination['itemStart'] = $this->howManyRecords;
                    $pagination['itemEnd'] = $this->howManyRecords * $pages;
                    break;
            }
        } else {
            $pagination['itemStart'] = 0;
            $pagination['itemEnd'] = $this->howManyRecords;
        }

        return $pagination;
    }

    public function getSortCookie()
    {
        if (!empty($_COOKIE['sort'])) {
            return $_COOKIE['sort'];
        } else {
            return null;
        }
    }

}
