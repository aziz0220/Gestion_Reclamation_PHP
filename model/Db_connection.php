<?php

namespace GestionReclam;

class Db_connection
{
    public static function database_connection(): \mysqli
    {
        $dbuser = "root";
        $dbpass = "";
        $host = "localhost";
        $db = "bankcomplaints";
        return new \mysqli($host, $dbuser, $dbpass, $db);
    }
}
