<?php

namespace core;

abstract class Controller
{
    /**
     * @param $page_action
     * @return bool
     */
    public function getView($page_action)
    {

        $templateView = new View($page_action);
        $templateView->templateView($this->content_data);

        return true;
    }

}
