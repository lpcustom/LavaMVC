<?php

namespace LavaMVC\Registries;
use LavaMVC\AbstractRegistry;

/**
 * Class LavaMVC\Registries\Server
 * @property string     $PHP_SELF;
 * @property string[]   argv
 * @property int        argc
 * @property string     GATEWAY_INTERFACE
 * @property string     SERVER_ADDR
 * @property string     SERVER_NAME
 * @property string     SERVER_SOFTWARE
 * @property string     SERVER_PROTOCOL
 * @property string     REQUEST_METHOD
 * @property int        REQUEST_TIME
 * @property float      REQUEST_TIME_FLOAT
 * @property string     QUERY_STRING
 * @property string     DOCUMENT_ROOT
 * @property string     HTTP_ACCEPT
 * @property string     HTTP_ACCEPT_CHARSET
 * @property string     HTTP_ACCEPT_ENCODING
 * @property string     HTTP_ACCEPT_LANGUAGE
 * @property string     HTTP_CONNECTION
 * @property string     HTTP_HOST
 * @property string     HTTP_REFERER
 * @property string     HTTP_USER_AGENT
 * @property boolean    HTTPS
 * @property string     REMOTE_ADDR
 * @property string     REMOTE_HOST
 * @property int        REMOTE_PORT
 * @property string     REMOTE_USER
 * @property string     REDIRECT_REMOTE_USER
 * @property string     SCRIPT_FILENAME
 * @property string     SERVER_ADMIN
 * @property string     SERVER_SIGNATURE
 * @property string     PATH_TRANSLATED
 * @property string     SCRIPT_NAME
 * @property string     REQUEST_URI
 * @property string     PHP_AUTH_DIGEST
 * @property string     PHP_AUTH_USER
 * @property string     PHP_AUTH_PW
 * @property string     AUTH_TYPE
 * @property string     PATH_INFO
 * @property string     ORIG_PATH_INFO
 */

class Server extends AbstractRegistry {

    public function __construct() {
        $this->_items = (object) $_SERVER;
    }
}