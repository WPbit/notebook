<?php

namespace core;

class Database {

    protected $pdo;
    protected static $instance;

    private function __clone() {}
    private function __wakeup() {}

    protected  function __construct()
    {
        try {
            $this->pdo = new \PDO ('mysql:host=' . DB_HOST . ';port=' . DB_PORT  . ';charset=' . DB_CHARSET . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            echo "Error!: " . $e->getMessage();
        }
    }

    /**
     * @return Database
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @return array|false
     */
    public function getDbResult($sql)
    {
        $prepare = $this->pdo->prepare($sql);
        $res_query = $prepare->execute();
        if ($res_query) {
            return $prepare->fetchAll();
        } else {
            return [];
        }
    }
}
