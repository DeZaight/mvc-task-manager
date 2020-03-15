<?php

namespace core;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DataBase;
    }
}
