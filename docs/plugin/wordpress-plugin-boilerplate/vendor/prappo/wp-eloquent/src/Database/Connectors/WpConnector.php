<?php

namespace Prappo\WpEloquent\Database\Connectors;

use Prappo\WpEloquent\Database\WpPdo;

class WpConnector extends MySqlConnector
{
    /**
     * Establish a database connection.
     *
     * @param array $config
     * @return \PDO
     */
    public function connect(array $config)
    {
        $dsn = $this->getDsn($config);

        $options = $this->getOptions($config);

        // We need to grab the PDO options that should be used while making the brand
        // new connection instance. The PDO options control various aspects of the
        // connection's behavior, and some might be specified by the developers.
        $connection = $this->createConnection($dsn, $config, $options);

        if (!empty($config['database'])) {
            if (defined('DB_NAME') && $config['database'] !== DB_NAME) {
                $connection->exec("use `{$config['database']}`;");
            }
        }

        $this->configureIsolationLevel($connection, $config);

        $this->configureEncoding($connection, $config);

        // Next, we will check to see if a timezone has been specified in this config
        // and if it has we will issue a statement to modify the timezone with the
        // database. Setting this DB timezone is an optional configuration item.
        $this->configureTimezone($connection, $config);

        $this->setModes($connection, $config);

        return $connection;
    }

    /**
     * Create a new PDO connection instance.
     *
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     * @return \PDO
     */
    protected function createPdoConnection($dsn, $username, $password, $options)
    {
        global $wpdb;
        if(!isset($wpdb)){
            throw new \RuntimeException("[wpdb] is not loaded");
        }
        return new WpPdo($wpdb, $dsn, $username, $password, $options);
    }
}