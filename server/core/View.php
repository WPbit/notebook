<?php

namespace core;

class View
{
    public $page_content_file;

    /**
     * @param $page_action
     */
    public function __construct($page_action)
    {
        $this->page_content_file = '../app/view/layout/' . $page_action . '.php';
    }

    /**
     * @param $page_data
     */
    public function templateView($page_data)
    {
        extract($page_data);

        // Header
        include '../app/view/template/header.php';

        // Navbar
        include '../app/view/template/navbar.php';

        // Alerts
        if (!empty($_SESSION['alerts'])) {
            include '../app/view/template/alerts.php';
        }

        // Main Content
        if (file_exists($this->page_content_file)) {
            include $this->page_content_file;
        } else {
            echo 'view file (' . $this->page_content_file . ') not found...';
        }

        // Footer
        include '../app/view/template/footer.php';

        // Clean alerts
        if (!empty($_SESSION['alerts'])) {
            unset($_SESSION['alerts']);
        }

    }
}
