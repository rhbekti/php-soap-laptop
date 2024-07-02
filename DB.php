<?php

class DB
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli('127.0.0.1', 'root', 'root', 'db_soap_laptop');
    }
}
