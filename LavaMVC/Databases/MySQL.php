<?php

namespace LavaMVC\Databases;

use LavaMVC\AbstractDatabase;

class MySQL extends AbstractDatabase {

    public function __construct(\stdClass $config) {
        $dsn  = 'mysql:dbname=' . $config->db . ";host=" . $config->host . ";port=" . $config->port;
        $this->_pdo  = new \PDO($dsn, $config->user, $config->pass);
        $this->setType($config->type);
    }
}