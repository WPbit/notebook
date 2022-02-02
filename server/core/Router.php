<?php

namespace core;

class Router
{
    /**
     * @param $uri
     * @param array $routes
     * @param array $auth_query
     */
    public static function getRoute($uri, $routes=[])
    {
        $query = self::getUrl($uri);

        if (isset($routes[$query])) {

            $controller_name = ucfirst($routes[$query]['controller']);
            $controllerClass = 'app\controller\\' . $controller_name;

            if (class_exists($controllerClass)) {

                $page = new $controllerClass();
                $page_action = lcfirst($routes[$query]['action']);

                if (method_exists($page, $page_action)) {

                    $page->$page_action();

                } else {
                    echo 'action (' . $page_action . ') not found';
                }
            } else {
                echo 'class (' . $controllerClass . ') not found';
            }
        } else {
            include '404.html';
        }
    }

    /**
     * @param $uri
     * @return string
     */
    protected static function getUrl($uri)
    {
        $uri_arr = explode('/', $uri, 2);
        $uri_arr = explode('?', $uri_arr[1], 2);

        return rtrim($uri_arr[0], '/');
    }

}
