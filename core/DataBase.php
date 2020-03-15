<?php

namespace core;

use PDO;

class DataBase
{
    private $db;

    public function __construct()
    {
        $db = require 'config/database.php';
        $this->db = new PDO($db['driver'] . ':host=' . $db['host'] . ';dbname=' . $db['name'], $db['user'], $db['password'], [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function query($sql, $params = [])
    {
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $query->execute($params);
        return $query;
    }

    public function fetch($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
