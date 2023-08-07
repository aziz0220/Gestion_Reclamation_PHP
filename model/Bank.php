<?php

namespace GestionReclam;

require 'Db_connection.php';

use GestionReclam\Db_connection;

class Bank
{
    private $mysqli;

    public function __construct()
    {
        $dbConnection = new Db_connection();
        $this->mysqli = $dbConnection->database_connection();
    }

    public function getBankSettings()
    {
        $ret = "SELECT * FROM `bank_settings` ";
        $stmt = $this->mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }
}