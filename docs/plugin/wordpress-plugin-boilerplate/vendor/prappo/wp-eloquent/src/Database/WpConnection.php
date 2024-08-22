<?php


namespace Prappo\WpEloquent\Database;

class WpConnection extends MySqlConnection
{
    /**
     * The active PDO connection.
     *
     * @var WpPdo
     */
    protected $pdo;

    /**
     * @return WpPdo|\Closure|\PDO
     */
    function getPdo()
    {
        return parent::getPdo();
    }
}
