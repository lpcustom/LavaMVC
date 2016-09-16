<?php declare(strict_types=1);

namespace App\Models;

use LavaMVC\Models\AbstractSQLTable;

class Users extends AbstractSQLTable {

    /**
     * Users constructor.
     * @param string $database
     */
    protected function __construct($database = null) {
        parent::__construct('users', 'id', $database);
    }

    /**
     * @param string|null $database
     * @return static
     */
    public static function create($database = null) {
        return new static($database);
    }
}