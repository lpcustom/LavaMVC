<?php declare(strict_types=1);

namespace LavaMVC;

/**
 * Class AbstractModel
 * @package LavaMVC
 * @param AbstractDatabase $_db
 */
abstract class AbstractModel {

    const RETURN_NONE = 0;
    const RETURN_ONE  = 1;
    const RETURN_MANY = 2;

    protected $_db;

    /**
     * AbstractModel constructor.
     * @param AbstractDatabase $db
     */
    protected function __construct(AbstractDatabase $db) {
        $this->_db = $db;
    }

    abstract public static function create($database = null);

    /** @noinspection MoreThanThreeArgumentsInspection */
    /**
     * @param $sql
     * @param string[]  $data
     * @param int       $return
     * @param null      $cache
     * @param AbstractDatabase $database
     * @param bool $verbose
     * @throws \UnexpectedValueException
     */
    public function query($sql, $data = null, $return = self::RETURN_NONE, $cache = null, $database = null, $verbose = false) {
        $sql        = trim(preg_replace('!\s+!', ' ', $sql));
        $output     = array();
        if(null === $database) {
            $database = $this->_db;
        }

        $operation  = AbstractDatabase::TYPE_READ;
        switch($return) {
            case self::RETURN_NONE:
                $operation = AbstractDatabase::TYPE_WRITE;
                break;
            case self::RETURN_ONE:
            case self::RETURN_MANY:
                // already set to read
                break;
            default:
                $database->setType($return);
        }

        if($operation === AbstractDatabase::TYPE_WRITE) {
            $this->beforeWrite($sql, $data);
        } else {
            $this->beforeRead($sql, $data);
        }
    }

    public function beforeWrite($sql, $data) {}
    public function beforeRead($sql, $data)  {}
    public function afterWrite($sql, $data)  {}
    public function afterRead($sql, $data)   {}

}