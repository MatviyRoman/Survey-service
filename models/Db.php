<?php

require_once 'libs/rb.php';
require_once 'config/database.php';

new Db($config);

class Db
{
    public function __construct($config = false)
    {
        if (!R::testConnection()) {
            R:: setup('mysql:host=' . $config['host'] . ';dbname=' . $config['database'], $config['username'], $config['password']);
        }

        if (!R::testConnection()) {
            exit('No connection to the database');
        }

        R::freeze(true);
    }
}
