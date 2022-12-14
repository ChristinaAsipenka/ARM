<?php

namespace Engine\Core\Database;

use \PDO;
use Engine\Core\Config\Config;

class Connection
{
    private $link;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = Config::group('database');
/*print_r($config);*/
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
/*echo $dsn;*/
        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    /**
     * @param $sql
     * @param array $values
     * @return mixed
     */
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }

    /**
     * @param $sql
     * @param array $values
     * @param int $statement
     * @return array
     */
    public function query($sql, $values = [], $statement = PDO::FETCH_ASSOC)
    {
        $sth = $this->link->prepare($sql);
	
        $sth->execute($values);

        $result = $sth->fetchAll($statement);

        if($result === false){
            return [];
        }

        return $result;
    }

    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}